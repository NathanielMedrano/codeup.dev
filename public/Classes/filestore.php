<?php

 class Filestore {


public $filename = 'address_book.csv';

    public $items = array();

    function __construct($filename = '') {
        if(!empty($filename)){
        // Sets $this->filename
                $this->filename = $filename;
            }
    }

    /**
     * Returns array of lines in $this->filename
     */
    public function read_file() {
        if(filesize($this->filename) == 0) {
        return array();
            }
            $handle = fopen($this->filename, 'r');
            $contents = fread($handle, filesize($this->filename));
            $items = explode("\n", $contents);
            fclose($handle);
            return $items;
    }

    public function save_file($items) {
        //var_dump($items);
            if (!is_array($items)) {
                throw new Exception('$items must be a string');
            }
            
        $string = implode("\n", $items);
        $handle = fopen($this->filename, 'w');
        fwrite($handle, $string);
        fclose($handle);
    }

     /**
     * Writes each element in $array to a new line in $this->filename
     */

    public function get_list() {
        if (filesize($this->filename) > 0) {
            return $this->read_lines($this->filename);
        } else {
            return array();
        }
    }

    /**
     * Reads contents of csv $this->filename, returns an array
     */
    public function read_csv() {
        $contents = [];
        $handle = fopen($this->filename, "r");
        while (($data = fgetcsv($handle)) !== FALSE) {
            $contents[] = $data;
        }
        fclose($handle);
        return $contents;
    }

    /**
     * Writes contents of $array to csv $this->filename
     */
    public function write_csv($address_book) {
            $handle = fopen($this->filename, 'w');
            foreach ($address_book as $row) {
                fputcsv($handle, $row);
                }
            fclose($handle);
        }

   // class UnexpextedTypeExcetion extends Exception {}


}