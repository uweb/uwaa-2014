<?php namespace UWAA\API\DataEndpoint\GeoJSON;


class ChapterMap extends GeoJSON implements \UWAA\API\DataEndpoint\DataEndpoint
{

public function build($endpointData)
    {
        $payload = $this->buildFeatureCollection($endpointData);        
        $serializedPayload = $payload->jsonSerialize();        
        $jsonPayload = json_encode($serializedPayload);
        $error = json_last_error();
        if (!$payload) {
            echo 'Payload could not be generated';
            switch ($error) {
        case JSON_ERROR_NONE:
            echo ' - No errors';
        break;
        case JSON_ERROR_DEPTH:
            echo ' - Maximum stack depth exceeded';
        break;
        case JSON_ERROR_STATE_MISMATCH:
            echo ' - Underflow or the modes mismatch';
        break;
        case JSON_ERROR_CTRL_CHAR:
            echo ' - Unexpected control character found';
        break;
        case JSON_ERROR_SYNTAX:
            echo ' - Syntax error, malformed JSON';
        break;
        case JSON_ERROR_UTF8:
            echo ' - Malformed UTF-8 characters, possibly incorrectly encoded';
        break;
        default:
            echo ' - Unknown error';
        break;
    }

        }
        echo $jsonPayload;    
    }

    public function load($query)
    {
        $posts = $query->get_posts();
        foreach ($posts as $post):
            setup_postdata( $post );
            
            $featureContents = $this->getFeatureContents($post);

            try {
                $coordinates = $this->getCoordinates($post);
            } catch (Exception $e) 
                {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
                continue; 
               }
            try {
               $geometry = new \GeoJson\Geometry\Point($coordinates);
            
         } catch(Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n"; 
            continue; 
         }                

            $this->endpointData[] = $this->buildGeometryCollection($geometry, $featureContents); 

         endforeach;

         return $this->endpointData;
    }

	protected function getFeatureContents($post)
    {

        $link = $this->determineLink($post);
        $jumper = explode('#', esc_url(apply_filters('remove_cms' , $link))); 

        $featureContents = array(
            'logo' => esc_html($post->post_name),
            'link' => esc_url(apply_filters('remove_cms' , $link)),
            'excerpt' => esc_html(get_post_meta($post->ID, 'mb_chapter_map_excerpt', true)),            
            'marker-color' => '#4b2e83',
            'jumper' => $jumper[1]
        );

        return $featureContents;
    }

    private function determineLink($post) {

        $linkToMajorMarket = apply_filters('remove_cms' ,get_permalink($post->ID));        
        $homeURL = home_url('/');
        $linkToOtherChaptersPage = '#' . $post->post_name . '';
        $isMajorMarket = get_post_meta($post->ID, 'mb_isMajorMarket', true);
        $isUSOrInternational = get_post_meta($post->ID, 'mb_internationalOrUS', true);


        if ($isMajorMarket == 'majorMarket') {
            return $linkToMajorMarket;            

        }

        switch ($isUSOrInternational) {
            case 'us':
                return $homeURL . "communities/u-s-huskies/#" . $post->post_name; 
                break;

            case 'international':
                return $homeURL . "communities/international-huskies/#" . $post->post_name;
                break;
            
            default:
                return $linkToOtherChaptersPage;
                break;
        }


        

        

    }

}