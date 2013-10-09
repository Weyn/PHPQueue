<?php
/**
 * Author: Maciek Wegrecki
 * Date: 10/9/13
 * Time: 10:20 PM
 */

/**
 * Class StackInterface
 */
interface StackInterface {

    /**
     * @param $data
     * @return mixed
     */
    public function push($data);

    /**
     * @return mixed
     */
    public function pop();

    /**
     * @return mixed
     */
    public function top();

    /**
     * @return mixed
     */
    public function isEmpty();

}