<?php
namespace Github\Api;
/**
 * Implement the Search API.
 */
class Search
{
    public function __construct($query) {
        $this->query = $query;
    }

    public function repositories($query = null, $sort = 'updated', $order = 'desc')
    {
        //$res = file_get_contents("https://api.github.com/users/google/repos");
        //$res = json_decode($res);

        return 'hi';
        //return $this->get('/search/repositories', array('q' => $q, 'sort' => $sort, 'order' => $order));
    }


}
// Test
$test = new Search('qeremy');
print_r( $test->repositories() );