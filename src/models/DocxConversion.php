<?php


class DocxConversion
{
    private $file;
    private $indexes = [ ];
    /** Local directory name where images will be saved */
    const UPLOAD_DIRECTORY = '/../public/uploads/docimages/';
    public function __construct( $filePath ) {
        $this->file = $filePath;
    }
    function extractImages() {
        $ZipArchive = new ZipArchive;
        if ( true === $ZipArchive->open( $this->file ) ) {
            for ( $i = 0; $i < $ZipArchive->numFiles; $i ++ ) {
                $zip_element = $ZipArchive->statIndex( $i );
                if ( preg_match( "([^\s]+(\.(?i)(jpg|jpeg|png|gif|bmp))$)", $zip_element['name'] ) ) {
                    $imagename = explode( '/', $zip_element['name'] );
                    $imagename = end( $imagename );
                    $this->indexes[ $imagename ] = $i;
                }
            }
        }
        return $this->saveAllImages();
    }

    private function read_docx(){

        $striped_content = '';
        $content = '';
        $contentTable = [];

        $zip = zip_open($this->file);

        if (!$zip || is_numeric($zip)) return false;

        while ($zip_entry = zip_read($zip)) {
            if (zip_entry_open($zip, $zip_entry) == FALSE) continue;

            if (zip_entry_name($zip_entry) != "word/document.xml") continue;
            $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

            zip_entry_close($zip_entry);
        }// end while

        zip_close($zip);

        $content = str_replace('</w:r></w:p>', "/paragraph/", $content);
//        $content = str_replace('binData', "/image/", $content);
//        $content = str_replace('<w:bCs/>', "/header/", $content);
        $striped_content = strip_tags($content);


        $contentTable = explode('/paragraph/', $content);
        return $contentTable;
    }

    public function convertToText() {

        if(isset($this->filename) && !file_exists($this->filename)) {
            return "File Not exists";
        }

        $fileArray = pathinfo($this->file);
        $file_ext  = $fileArray['extension'];
        if($file_ext == "docx")
        {
            return $this->read_docx();
        } else {
            return "Invalid File Type";
        }
    }

    function saveAllImages() {
        $i = 0;
        if ( count( $this->indexes ) == 0 ) {
            return 0;
        }
        foreach ( $this->indexes as $key => $index ) {
            $zip = new ZipArchive;
            if ( true === $zip->open( $this->file ) ) {
                file_put_contents( dirname(__DIR__) . self::UPLOAD_DIRECTORY . $key, $zip->getFromIndex( $index ) );
                $i++;
            }
            $zip->close();
        }
        return $i;
    }
}