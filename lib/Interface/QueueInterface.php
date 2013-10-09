<?php
/**
 * Author: Maciek Wegrecki
 * Date: 10/9/13
 * Time: 10:20 PM
 */

/**
 * Class QueueInterface
 */
interface QueueInterface {

    /**
     * @param $data
     * @return mixed
     */
    public function enqueue($data);

    /**
     * @return mixed
     */
    public function dequeue();

    /**
     * @return mixed
     */
    public function isEmpty();

}