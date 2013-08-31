<?php
/*
 Make yii's assetmanager work under safe-mode,
 Through this is based on the linkAssets feature it only works for the platforms
 where linking is working (i think most unixes and modern windows)

 @author: balrok (http://balrok.com)
 
 to setup add this to your config:
 'components'=>array(
	'assetManager'=>array(
		'class'=>'application.extensions.SafeModeAssetManager',
	),
*/
	
class SafeModeAssetManager extends CAssetManager
{
	public $linkAssets=true;
	private $_published=array();

	public function publish($path,$hashByName=false,$level=-1,$forceCopy=false)
	{
		if(isset($this->_published[$path]))
			return $this->_published[$path];
		else if(($src=realpath($path))!==false)
		{
			if(is_file($src))
			{
				$dir=$this->hash($hashByName ? basename($src) : dirname($src));
				$fileName=basename($src);
				$dstDir=$this->getBasePath().DIRECTORY_SEPARATOR.$dir;
				$dstFile=$dstDir.'_'.$fileName;

				if($this->linkAssets)
				{
					if(!is_file($dstFile))
						symlink($src,$dstFile);
				}
				else if(@filemtime($dstFile)<@filemtime($src) || $forceCopy)
					copy($src,$dstFile);
				return $this->_published[$path]=$this->getBaseUrl().'/'.$dir.'_'.$fileName;
			}
			else if(is_dir($src))
			{
				$dir=$this->hash($hashByName ? basename($src) : $src);
				$dstDir=$this->getBasePath().DIRECTORY_SEPARATOR.$dir;

				if($this->linkAssets)
				{
					if(!is_dir($dstDir))
						symlink($src,$dstDir);
				}
				else if(!is_dir($dstDir) || $forceCopy)
					CFileHelper::copyDirectory($src,$dstDir,array('exclude'=>$this->excludeFiles,'level'=>$level));

				return $this->_published[$path]=$this->getBaseUrl().'/'.$dir;
			}
		}
		throw new CException(Yii::t('yii','The asset "{asset}" to be published does not exist.',
			array('{asset}'=>$path)));
	}

	public function getPublishedUrl($path,$hashByName=false)
	{
		if(isset($this->_published[$path]))
			return $this->_published[$path];
		if(($path=realpath($path))!==false)
		{
			if(is_file($path))
				return $this->getBaseUrl().'/'.$this->hash($hashByName ? basename($path) : dirname($path)).'_'.basename($path);
			else
				return $this->getBaseUrl().'/'.$this->hash($hashByName ? basename($path) : $path);
		}
		else
			return false;
	}
}
