<?php
/**
 * File class 
 * 
 * @package Sabre
 * @subpackage DAV
 * @copyright Copyright (C) 2007-2011 Rooftop Solutions. All rights reserved.
 * @author Evert Pot (http://www.rooftopsolutions.nl/) 
 * @license http://code.google.com/p/sabredav/wiki/License Modified BSD License
 */
class OC_Connector_Sabre_File extends OC_Connector_Sabre_Node implements Sabre_DAV_IFile {

	/**
	 * Updates the data
	 *
	 * @param resource $data
	 * @return void
	 */
	public function put($data) {

		OC_Filesystem::file_put_contents($this->path,$data);

	}

	/**
	 * Returns the data
	 *
	 * @return string
	 */
	public function get() {

		return OC_Filesystem::fopen($this->path,'r');

	}

	/**
	 * Delete the current file
	 *
	 * @return void
	 */
	public function delete() {

		OC_Filesystem::unlink($this->path);

	}

	/**
	 * Returns the size of the node, in bytes
	 *
	 * @return int
	 */
	public function getSize() {
	
		return OC_Filesystem::filesize($this->path);

	}

	/**
	 * Returns the ETag for a file
	 *
	 * An ETag is a unique identifier representing the current version of the file. If the file changes, the ETag MUST change.
	 * The ETag is an arbritrary string, but MUST be surrounded by double-quotes.
	 *
	 * Return null if the ETag can not effectively be determined
	 *
	 * @return mixed
	 */
	public function getETag() {

		return null;

	}

	/**
	 * Returns the mime-type for a file
	 *
	 * If null is returned, we'll assume application/octet-stream
	 *
	 * @return mixed
	 */
	public function getContentType() {

		return OC_Filesystem::getMimeType($this->path);

	}
}

