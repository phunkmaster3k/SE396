<?php

/**
 * Created by PhpStorm.
 * User: Nathan Livernols
 * Date: 4/18/2017
 * Time: 7:08 PM
 */
class uploader
{
    /**
     * @param $keyName
     * @return string
     */
    function upLoad($keyName) {

        if (!isset($_FILES[$keyName]['error']) || is_array($_FILES[$keyName]['error'])) {
            throw new RuntimeException('Invalid parameters.');
        }

        switch ($_FILES[$keyName]['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
                throw new RuntimeException('File size to large.');
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
            default:
                throw new RuntimeException('Unknown errors.');
        }

        if ($_FILES[$keyName]['size'] > 1000000) {
            throw new RuntimeException('Exceeded filesize limit.');
        }

        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $validExts = array(
            'txt' => 'text/plain',
            'html' => 'text/html',
            'pdf' => 'application/pdf',
            'doc' => 'application/msword',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'xls' => 'application/vnd.ms-excel',
            'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif'
        );
        $ext = array_search($finfo->file($_FILES[$keyName]['tmp_name']), $validExts, true);

        if (false === $ext) {
            throw new RuntimeException('Invalid file format.');
        }


        $salt = uniqid(mt_rand(), true);
        $fileName = 'file_' . sha1($salt . sha1_file($_FILES[$keyName]['tmp_name']));
        $location = sprintf('./uploads/%s.%s', $fileName, $ext);

        if (!is_dir('./uploads')) {
            mkdir('./uploads');
        }

        if (!move_uploaded_file($_FILES[$keyName]['tmp_name'], $location)) {
            throw new RuntimeException('Failed to move uploaded file.');
        }

        return $fileName . '.' . $ext;
    }

}