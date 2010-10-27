<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Captcha
 * @subpackage Adapter
 * @copyright  Copyright (c) 2005-2010 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id$
 */

/**
 * @namespace
 */
namespace Bundle\CaptchaBundle;

/**
 * Image-based captcha element
 *
 * Generates image displaying random word
 *
 * @uses       \Zend\Captcha\Exception
 * @uses       \Zend\Captcha\Word
 * @category   Zend
 * @package    Zend_Captcha
 * @subpackage Adapter
 * @copyright  Copyright (c) 2005-2010 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Image extends Word
{
    /**
     * Directory for generated images
     *
     * @var string
     */
    protected $_imgDir = "../web/img/captcha/";

    /**
     * URL for accessing images
     *
     * @var string
     */
    protected $_imgUrl = "/img/captcha/";

    /**
     * Image's alt tag content
     *
     * @var string
     */
    protected $_imgAlt = "";

    /**
     * Image suffix (including dot)
     *
     * @var string
     */
    protected $_suffix = ".png";

    /**
     * Image width
     *
     * @var int
     */
    protected $_width = 100;

    /**
     * Image height
     *
     * @var int
     */
    protected $_height = 40;

    /**
     * Font size
     *
     * @var int
     */
    protected $_fsize = 12;

    /**
     * Image font file
     *
     * @var string
     */
    protected $_font = './../src/Bundle/CaptchaBundle/Resources/Font/DejaVuSerif.ttf';
    /**
     * Image to use as starting point
     * Default is blank image. If provided, should be PNG image.
     *
     * @var string
     */
    protected $_startImage;
    /**
     * How frequently to execute garbage collection
     *
     * @var int
     */
    protected $_gcFreq = 10;

    /**
     * How long to keep generated images
     *
     * @var int
     */
    protected $_expiration = 100;
    /**
     * Number of noise lines on image
     *
     * @var int
     */
    protected $_lineNoiseLevel = 2;
    /**
     * @return string
     */
    public function getImgAlt ()
    {
        return $this->_imgAlt;
    }
    /**
     * @return string
     */
    public function getStartImage ()
    {
        return $this->_startImage;
    }
    /**
     * @return int
     */
    public function getLineNoiseLevel ()
    {
        return $this->_lineNoiseLevel;
    }
    /**
     * Get captcha expiration
     *
     * @return int
     */
    public function getExpiration()
    {
        return $this->_expiration;
    }

    /**
     * Get garbage collection frequency
     *
     * @return int
     */
    public function getGcFreq()
    {
        return $this->_gcFreq;
    }
    /**
     * Get font to use when generating captcha
     *
     * @return string
     */
    public function getFont()
    {
        return $this->_font;
    }

    /**
     * Get font size
     *
     * @return int
     */
    public function getFontSize()
    {
        return $this->_fsize;
    }

    /**
     * Get captcha image height
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->_height;
    }

    /**
     * Get captcha image directory
     *
     * @return string
     */
    public function getImgDir()
    {
        return $this->_imgDir;
    }
    /**
     * Get captcha image base URL
     *
     * @return string
     */
    public function getImgUrl()
    {
        return $this->_imgUrl;
    }
    /**
     * Get captcha image file suffix
     *
     * @return string
     */
    public function getSuffix()
    {
        return $this->_suffix;
    }
    /**
     * Get captcha image width
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->_width;
    }
    /**
     * @param string $startImage
     */
    public function setStartImage ($startImage)
    {
        $this->_startImage = $startImage;
        return $this;
    }
   /**
     * @param int $lineNoiseLevel
     */
    public function setLineNoiseLevel ($lineNoiseLevel)
    {
        $this->_lineNoiseLevel = $lineNoiseLevel;
        return $this;
    }

    /**
     * Set captcha expiration
     *
     * @param int $expiration
     * @return \Zend\Captcha\Image
     */
    public function setExpiration($expiration)
    {
        $this->_expiration = $expiration;
        return $this;
    }

    /**
     * Set garbage collection frequency
     *
     * @param int $gcFreq
     * @return \Zend\Captcha\Image
     */
    public function setGcFreq($gcFreq)
    {
        $this->_gcFreq = $gcFreq;
        return $this;
    }

    /**
     * Set captcha font
     *
     * @param  string $font
     * @return \Zend\Captcha\Image
     */
    public function setFont($font)
    {
        $this->_font = $font;
        return $this;
    }

    /**
     * Set captcha font size
     *
     * @param  int $fsize
     * @return \Zend\Captcha\Image
     */
    public function setFontSize($fsize)
    {
        $this->_fsize = $fsize;
        return $this;
    }

    /**
     * Set captcha image height
     *
     * @param  int $height
     * @return \Zend\Captcha\Image
     */
    public function setHeight($height)
    {
        $this->_height = $height;
        return $this;
    }

    /**
     * Set captcha image storage directory
     *
     * @param  string $imgDir
     * @return \Zend\Captcha\Image
     */
    public function setImgDir($imgDir)
    {
        $this->_imgDir = rtrim($imgDir, "/\\") . '/';
        return $this;
    }

    /**
     * Set captcha image base URL
     *
     * @param  string $imgUrl
     * @return \Zend\Captcha\Image
     */
    public function setImgUrl($imgUrl)
    {
        $this->_imgUrl = rtrim($imgUrl, "/\\") . '/';
        return $this;
    }
    /**
     * @param string $imgAlt
     */
    public function setImgAlt ($imgAlt)
    {
        $this->_imgAlt = $imgAlt;
        return $this;
    }

    /**
     * Set captch image filename suffix
     *
     * @param  string $suffix
     * @return \Zend\Captcha\Image
     */
    public function setSuffix($suffix)
    {
        $this->_suffix = $suffix;
        return $this;
    }

    /**
     * Set captcha image width
     *
     * @param  int $width
     * @return \Zend\Captcha\Image
     */
    public function setWidth($width)
    {
        $this->_width = $width;
        return $this;
    }

    /**
     * Generate random frequency
     *
     * @return float
     */
    protected function _randomFreq()
    {
        return mt_rand(700000, 1000000) / 15000000;
    }

    /**
     * Generate random phase
     *
     * @return float
     */
    protected function _randomPhase()
    {
        // random phase from 0 to pi
        return mt_rand(0, 3141592) / 1000000;
    }

    /**
     * Generate random character size
     *
     * @return int
     */
    protected function _randomSize()
    {
        return mt_rand(300, 700) / 100;
    }

    /**
     * Generate captcha
     *
     * @return string captcha ID
     */
    public function generate()
    {
        $id = parent::generate();
        $tries = 5;
        // If there's already such file, try creating a new ID
        while($tries-- && file_exists($this->getImgDir() . $id . $this->getSuffix())) {
            $id = $this->_generateRandomId();
            $this->_setId($id);
        }
        $this->_generateImage($id, $this->getWord());

        if (mt_rand(1, $this->getGcFreq()) == 1) {
            $this->_gc();
        }
        return $id;
    }

    /**
     * Generate image captcha
     *
     * Override this function if you want different image generator
     * From Kohana 3.x Captcha module
     *
     * @param string $id Captcha ID
     * @param string $word Captcha word
     */
    protected function _generateImage($id, $word)
    {
        if (!extension_loaded("gd")) {
            throw new Exception("Image CAPTCHA requires GD extension");
        }

        if (!function_exists("imagepng")) {
            throw new Exception("Image CAPTCHA requires PNG support");
        }

        if (!function_exists("imageftbbox")) {
            throw new Exception("Image CAPTCHA requires FT fonts support");
        }

        $font = $this->getFont();

        if (empty($font)) {
            throw new Exception("Image CAPTCHA requires font");
        }

        $w     = $this->getWidth();
        $h     = $this->getHeight();
        $fsize = $this->getFontSize();

        $img_file   = $this->getImgDir() . $id . $this->getSuffix();
        if(empty($this->_startImage)) {
            $img        = imagecreatetruecolor($w, $h);
        } else {
            $img = imagecreatefrompng($this->_startImage);
            if(!$img) {
                throw new Exception("Can not load start image");
            }
            $w = imagesx($img);
            $h = imagesy($img);
        }
        
        
        $color1 = imagecolorallocate($img, mt_rand(200, 255), mt_rand(200, 255), mt_rand(150, 255));
        $color2 = imagecolorallocate($img, mt_rand(200, 255), mt_rand(200, 255), mt_rand(150, 255));
        $directions = array('horizontal', 'vertical');
        $direction = 'horizontal';
        // Pick a random direction if needed
        if ( ! in_array($direction, $directions))
        {
            $direction = $directions[array_rand($directions)];

            // Switch colors
            if (mt_rand(0, 1) === 1)
            {
                $temp = $color1;
                $color1 = $color2;
                $color2 = $temp;
            }
        }

        // Extract RGB values
        $color1 = imagecolorsforindex($img, $color1);
        $color2 = imagecolorsforindex($img, $color2);

        // Preparations for the gradient loop
        
        $steps = ($direction === 'horizontal') ? $w : $h;

        $r1 = ($color1['red'] - $color2['red']) / $steps;
        $g1 = ($color1['green'] - $color2['green']) / $steps;
        $b1 = ($color1['blue'] - $color2['blue']) / $steps;

        if ($direction === 'horizontal')
        {
            $x1 =& $i;
            $y1 = 0;
            $x2 =& $i;
            $y2 = $h;
        }
        else
        {
            $x1 = 0;
            $y1 =& $i;
            $x2 = $w;
            $y2 =& $i;
        }

        // Execute the gradient loop
        for ($i = 0; $i <= $steps; $i++)
        {
            $r2 = $color1['red'] - floor($i * $r1);
            $g2 = $color1['green'] - floor($i * $g1);
            $b2 = $color1['blue'] - floor($i * $b1);
            $color = imagecolorallocate($img, $r2, $g2, $b2);

            imageline($img, $x1, $y1, $x2, $y2, $color);
        }
        
        $default_size = min($w, $h * 2) / (strlen($word) + 1);
        // Draw each Captcha character with varying attributes
        for ($i = 0, $strlen = strlen($word); $i < $strlen; $i++)
        {
            // Use different fonts if available
            $font = $font;

            // Allocate random color, size and rotation attributes to text
            $color = imagecolorallocate($img, mt_rand(0, 150), mt_rand(0, 150), mt_rand(0, 150));
            $angle = mt_rand(-40, 20);
            
            // Scale the character size on image height
            $size = $default_size / 10 * mt_rand(8, 12);
            $box = imageftbbox($size, $angle, $font, $word[$i]);

            // Calculate character starting coordinates
            $spacing = (int) $w * 0.9 / strlen($word);
            $box = imageftbbox($size, 0, $font, $word);
            $x = $spacing / 4 + $i * $spacing;
            $y = $h / 2 + ($box[2] - $box[5]) / 10;

            // Write text character to image
            imagefttext($img, $size, $angle, $x, $y, $color, $font, $word[$i]);
        }
        // add a few lines
        for ($i = 0, $count = mt_rand(5, $this->_lineNoiseLevel * 4); $i < $count; $i++)
        {
            $color = imagecolorallocatealpha($img, mt_rand(0, 255), mt_rand(0, 255), mt_rand(100, 255), mt_rand(50, 120));
            imageline($img, mt_rand(0, $w), 0, mt_rand(0,$w), $h, $color);
        }

        imagepng($img, $img_file);
        imagedestroy($img);
    }

    /**
     * Remove old files from image directory
     *
     */
    protected function _gc()
    {
        $expire = time() - $this->getExpiration();
        $imgdir = $this->getImgDir();
        if(!$imgdir || strlen($imgdir) < 2) {
            // safety guard
            return;
        }
        $suffixLength = strlen($this->_suffix);
        foreach (new \DirectoryIterator($imgdir) as $file) {
            if (!$file->isDot() && !$file->isDir()) {
                if ($file->getMTime() < $expire) {
                    // only deletes files ending with $this->_suffix
                    if (substr($file->getFilename(), -($suffixLength)) == $this->_suffix) {
                        unlink($file->getPathname());
                    }
                }
            }
        }
    }

    /**
     * Display the captcha
     *
     * @param Zend_View_Interface $view
     * @param mixed $element
     * @return string
     */
    public function render(\Zend\View\ViewEngine $view = null, $element = null)
    {
        $this->generate();
        return '<img width="' . $this->getWidth() . '" height="' . $this->getHeight() . '" alt="' . $this->getImgAlt()
             . '" src="' . $this->getImgUrl() . $this->getId() . $this->getSuffix() . '" />';
    }
}
