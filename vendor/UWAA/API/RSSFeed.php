<?php namespace UWAA\API;


class RSSFeed
{

    private $eventFields;
    private $benefitFields;
    private $newsFields;


    public function __construct() {

        $this->benefitFields = array(
            'fields' => array(
                'mb_benefit_promotion'
                ),
            'hasTaxonomy' => true,
            'taxonomyName' => array(
                'benefits'                          
                ),
            'hasGeotag' => true
            );

        $this->eventFields = array(
            'fields' => array(
                'mb_start_date',
                'mb_event_time',
                'mb_event_location'
                ),
            'hasTaxonomy' => false,
            'hasGeotag' => true            
            );

        add_action('rss2_item', array($this, 'addFeedAugmentations'));
        add_action('rss2_ns', array($this, 'addUWAANamespaceTFeed'));
    
    }

    public function addFeedAugmentations() {        
        $this->augmentFeed('benefits', $this->benefitFields['fields'], $this->benefitFields['hasTaxonomy'], $this->benefitFields['taxonomyName'], $this->benefitFields['hasGeotag']);
        $this->augmentFeed('events', $this->eventFields['fields'], $this->eventFields['hasTaxonomy'], $this->eventFields['taxonomyName'], $this->eventFields['hasGeotag'] );
    }

    public function addUWAANamespaceTFeed()
    {
        echo "xmlns:uwaa_app=\"http://depts.washington.edu/alumni/appfeed/namespace/\"\n";
    }

    private function augmentFeed($postType, $metaValues, $hasTaxonomy = false, $taxonomyName = null, $geotag = false)
    {        
        if ($this->isPostType($postType) == true)
        {            
            $this->addMetaValuesToFeed($metaValues);
        }

        if ($hasTaxonomy == true) {
            $this->addTaxonomyValuesToFeed($taxonomyName);
        }

        if ($geotag == true) {
            $this->addGeoTagsToFeed();
        }
        return;
    }

    private function isPostType($postType) {

        

        if (get_post_type() == $postType) {            
            
            return true;
        }

        return false;
    }


    private function addMetaValuesToFeed($metaValues) {
        foreach($metaValues as $field) 
        {
            
            if ($value = get_post_meta(get_the_id() , $field,true))
            {
                
                $element = str_replace('mb_', '', $field);
                echo "<uwaa_app:{$element}><![CDATA[{$value}]]></uwaa_app:{$element}>\n";
                
            }
        }
    }

    private function addTaxonomyValuesToFeed($taxonomyNames) {
        foreach ($taxonomyNames as $category) {
            $terms = get_the_terms(get_the_id(), $category);

            if(is_array($terms)) {
                foreach ($terms as $term) {
                    echo "<category><![CDATA[{$term->name}]]></category>\n";    
                }
            }
        }

    }

    private function addGeoTagsToFeed() {

        
            $terms = get_the_terms(get_the_id(), 'app_geotag');

            if(is_array($terms)) {
                foreach ($terms as $term) {
                    echo "<uwaa_app:geotag><![CDATA[{$term->name}]]></uwaa_app:geotag>\n";    
                }
            }
    }

    





}
