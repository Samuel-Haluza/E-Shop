<?php
class SocialLinks {
    private $links;

    public function __construct($links = []) {
        if (empty($links)) {
            $links = [
                'facebook-f' => 'http://fb.com/templatemo',
                'instagram' => 'https://www.instagram.com/',
                'twitter' => 'https://twitter.com/',
                'linkedin' => 'https://www.linkedin.com/'
            ];
        }
        $this->links = $links;
    }

    public function getLinks() {
        return $this->links;
    }
}
