<?php

namespace Chat\Integration;

use Chat\Model\ChatEntry;
/**
 * Handles the storing and retrieving of data from the chat data for the recipes
 */
class ChatHandler {
  private $r1DataFile = "C:\UniServerZ\www\database\\receipe1data.txt";
  private $r2DataFile = "C:\UniServerZ\www\database\\receipe2data.txt";


  /**
  * Writes a new comment to the chat database
  * @param userName name of the authour
  * @param message the message that was written by the user
  */
  function addComment($receipePage,$userName,$message){
          if($receipePage == "recipe1"){
              $file = $this->r1DataFile;
          }
          else{
              $file = $this->r2DataFile;
          }
          $current = file_get_contents($file);
          $commentToPost = $userName.":".$message;
          $current = $commentToPost."\n".$current;
          file_put_contents($file, $current);
  }
  /**
  * Removes a comment entry from the chat database
  * @param int line number of the entry that is to be removed
  */
  function deleteComment($receipePage, $commentToRemove){
            if($_SERVER['QUERY_STRING'] == "recipe1"){
                $file = $this->r1DataFile;
            }
            else{
                $file = $this->r2DataFile;
            }
           $current = file_get_contents($file);
           $lines = explode("\n",$current);
           $index = 0;
           $returnString = "";
           foreach($lines as $l){
             if(!("".$index=="".$commentToRemove)){
              $returnString.=$l."\n";
            }
            $index+=1;
           }
           file_put_contents($file, $returnString);
   }
   /**
   * Removes a comment entry from the chat database
   * @param int the receipe page which data is to be received
   * @return array All the comment entries in a array of ChatEntry objects
   */
   function getCommentEntries($receipePageNumber){
     $entries = array();

     if($receipePageNumber==1){
         $file = $this->r1DataFile;
     }
     else{
         $file = $this->r2DataFile;
     }

     $document = file_get_contents($file);
     $lines = explode("\n",$document);
     $commentLine = 0;
     foreach($lines as $commentEntry){

         $commentEntry = explode(":",$commentEntry);
         if(!empty($commentEntry[0])){
           $entry = new ChatEntry($commentEntry[0],$commentEntry[1]);
           array_push($entries,$entry);
         }


      }
      return $entries;
    }
  }
