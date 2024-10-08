<?php
//create a class
//create  a function that call an api

class News_Board_API
{
    //sends get request to https://newsapi.org/v2/everything
    public function news_board_api_request(){
        //api call
        //return json
        //we use wp_remote_get( )

        $url = 'https://newsapi.org/v2/everything?q=tesla&from=2024-09-07&sortBy=publishedAt&apiKey=bc177b3444b54f3cbdeb5aec446eefa5';
        $response = wp_remote_get( $url,
            array(
                'timeout'      => 120,
                'httpversion'  => '1.1' ,
            )
        ); 
        
        
        return json_decode( wp_remote_retrieve_body( $response ), true );
       // return $response;
        
    }
    
    public function news_board_display(){
        //2.display result from news_board_api_request () function with buffer
        //2.1. do error handling , is the respone 200?
        //2.2. call the news_board_api_request() here
        //
        echo "Hello world";
   
        $news_data = $this->news_board_api_request();
            if (is_wp_error($news_data)) {
        // Print the error message if there was a WP error
                 echo '<h3>Here is the error:</h3>' . 'Error: ' . $news_data->get_error_message();
                return;
            }
       
            if (isset($news_data['articles']) && is_array($news_data['articles'])) {
                foreach($news_data['articles'] as $article) {
                    echo '<h3>' . esc_html($article['title']) . '</h3>';
                    echo '<p>' . esc_html($article['description']) . '</p>';
                    echo '<p><a href="' . esc_url($article['url']) . '">Read more</a></p>';
                }
            } else {
                echo '<p>No news available at the moment.</p>';
            }
        
    }

    
}
?>