<?php
/**
 * HTML2PDF Librairy - main class
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author  Laurent MINGUET <webmaster@html2pdf.fr>
 * @version 4.03
 */

if (!defined('__CLASS_HTML2PDF__')) {

    define('__CLASS_HTML2PDF__', '4.03');
    define('HTML2PDF_USED_TCPDF_VERSION', '5.0.002');

    require_once(dirname(__FILE__).'/_class/exception.class.php');
    require_once(dirname(__FILE__).'/_class/locale.class.php');
    require_once(dirname(__FILE__).'/_class/myPdf.class.php');
    require_once(dirname(__FILE__).'/_class/parsingHtml.class.php');
    require_once(dirname(__FILE__).'/_class/parsingCss.class.php');

    class HTML2PDF
    {
        /**
         * HTML2PDF_myPdf object, extends from TCPDF
         * @var HTML2PDF_myPdf
         */
        public $pdf = null;

        /**
         * CSS parsing
         * @var HTML2PDF_parsingCss
         */
        public $parsingCss = null;

        /**
         * HTML parsing
         * @var HTML2PDF_parsingHtml
         */
        public $parsingHtml = null;

        protected $_langue           = 'fr';        // locale of the messages
        protected $_orientation      = 'P';         // page orientation : Portrait ou Landscape
        protected $_format           = 'A4';        // page format : A4, A3, ...
        protected $_encoding         = '';          // charset encoding
        protected $_unicode          = true;        // means that the input text is unicode (default = true)

        protected $_testTdInOnepage  = true;        // test of TD that can not take more than one page
        protected $_testIsImage      = true;        // test if the images exist or not
        protected $_testIsDeprecated = false;       // test the deprecated functions

        protected $_parsePos         = 0;           // position in the parsing
        protected $_tempPos          = 0;           // temporary position for complex table
        protected $_page             = 0;           // current page number

        protected $_subHtml          = null;        // sub html
        protected $_subPart          = false;       // sub HTML2PDF
        protected $_subHEADER        = array();     // sub action to make the header
        protected $_subFOOTER        = array();     // sub action to make the footer
        protected $_subSTATES        = array();     // array to save some parameters

        protected $_isSubPart        = false;       // flag : in a sub html2pdf
        protected $_isInThead        = false;       // flag : in a thead
        protected $_isInTfoot        = false;       // flag : in a tfoot
        protected $_isInOverflow     = false;       // flag : in a overflow
        protected $_isInFooter       = false;       // flag : in a footer
        protected $_isInDraw         = null;        // flag : in a draw (svg)
        protected $_isAfterFloat     = false;       // flag : is just after a float
        protected $_isInForm         = false;       // flag : is in a float. false / action of the form
        protected $_isInLink         = '';          // flag : is in a link. empty / href of the link
        protected $_isInParagraph    = false;       // flag : is in a paragraph
        protected $_isForOneLine     = false;       // flag : in a specific sub html2pdf to have the height of the next line

        protected $_maxX             = 0;           // maximum X of the current zone
        protected $_maxY             = 0;           // maximum Y of the current zone
        protected $_maxE             = 0;           // number of elements in the current zone
        protected $_maxH             = 0;           // maximum height of the line in the current zone
        protected $_maxSave          = array();     // save the maximums of the current zone
        protected $_currentH         = 0;           // height of the current line

        protected $_defaultLeft      = 0;           // default marges of the page
        protected $_defaultTop       = 0;
        protected $_defaultRight     = 0;
        protected $_defaultBottom    = 0;
        protected $_defaultFont      = null;        // default font to use, is the asked font does not exist

        protected $_margeLeft        = 0;           // current marges of the page
        protected $_margeTop         = 0;
        protected $_margeRight       = 0;
        protected $_margeBottom      = 0;
        protected $_marges           = array();     // save the different marges of the current page
        protected $_pageMarges       = array();     // float marges of the current page
        protected $_background       = array();     // background informations


        protected $_firstPage        = true;        // flag : first page
        protected $_defList          = array();     // table to save the stats of the tags UL and OL

        protected $_lstAnchor        = array();     // list of the anchors
        protected $_lstField         = array();     // list of the fields
        protected $_lstSelect        = array();     // list of the options of the current select
        protected $_previousCall     = null;        // last action called

        protected $_debugActif       = false;       // flag : mode debug is active
        protected $_debugOkUsage     = false;       // flag : the function memory_get_usage exist
        protected $_debugOkPeak      = false;       // flag : the function memory_get_peak_usage exist
        protected $_debugLevel       = 0;           // level in the debug
        protected $_debugStartTime   = 0;           // debug start time
        protected $_debugLastTime    = 0;           // debug stop time

        static protected $_subobj    = null;        // object html2pdf prepared in order to accelerate the creation of sub html2pdf
        static protected $_tables    = array();     // static table to prepare the nested html tables

        /**
         * class constructor
         *
         * @access public
         * @param  string   $orientation page orientation, same as TCPDF
         * @param  mixed    $format      The format used for pages, same as TCPDF
         * @param  $tring   $langue      Langue : fr, en, it...
         * @param  boolean  $unicode     TRUE means that the input text is unicode (default = true)
         * @param  String   $encoding    charset encoding; default is UTF-8
         * @param  array    $marges      Default marges (left, top, right, bottom)
         * @return HTML2PDF $this
         */
        public function __construct($orientation = 'P', $format = 'A4', $langue='fr', $unicode=true, $encoding='UTF-8', $marges = array(5, 5, 5, 8))
        {
            // init the page number
            $this->_page         = 0;
            $this->_firstPage    = true;

            // save the parameters
            $this->_orientation  = $orientation;
            $this->_format       = $format;
            $this->_langue       = strtolower($langue);
            $this->_unicode      = $unicode;
            $this->_encoding     = $encoding;

            // load the Local
            HTML2PDF_locale::load($this->_langue);

            // create the  HTML2PDF_myPdf object
            $this->pdf = new HTML2PDF_myPdf($orientation, 'mm', $format, $unicode, $encoding);

            // init the CSS parsing object
            $this->parsingCss = new HTML2PDF_parsingCss($this->pdf);
            $this->parsingCss->fontSet();
            $this->_defList = array();

            // init some tests
            $this->setTestTdInOnePage(true);
            $this->setTestIsImage(true);
            $this->setTestIsDeprecated(true);

            // init the default font
            $this->setDefaultFont(null);

            // init the HTML parsing object
            $this->parsingHtml = new HTML2PDF_parsingHtml($this->_encoding);
            $this->_subHtml = null;
            $this->_subPart = false;

            // init the marges of the page
            if (!is_array($marges)) $marges = array($marges, $marges, $marges, $marges);
            $this->_setDefaultMargins($marges[0], $marges[1], $marges[2], $marges[3]);
            $this->_setMargins();
            $this->_marges = array();

            // init the form's fields
            $this->_lstField = array();

            return $this;
        }

        /**
         * Destructor
         *
         * @access public
         * @return null
         */
        public function __destruct()
        {

        }

        /**
         * Clone to create a sub HTML2PDF from HTML2PDF::$_subobj
         *
         * @access public
         */
        public function __clone()
        {
            $this->pdf = clone $this->pdf;
            $this->parsingHtml = clone $this->parsingHtml;
            $this->parsingCss = clone $this->parsingCss;
            $this->parsingCss->setPdfParent($this->pdf);
        }

        /**
         * set the debug mode to On
         *
         * @access public
         * @return HTML2PDF $this
         */
        public function setModeDebug()
        {
            $time = microtime(true);

            $this->_debugActif     = true;
            $this->_debugOkUsage   = function_exists('memory_get_usage');
            $this->_debugOkPeak    = function_exists('memory_get_peak_usage');
            $this->_debugStartTime = $time;
            $this->_debugLastTime  = $time;

            $this->_DEBUG_stepline('step', 'time', 'delta', 'memory', 'peak');
            $this->_DEBUG_add('Init debug');

            return $this;
        }

        /**
         * Set the test of TD thdat can not take more than one page
         *
         * @access public
         * @param  boolean  $mode
         * @return HTML2PDF $this
         */
        public function setTestTdInOnePage($mode = true)
        {
            $this->_testTdInOnepage = $mode ? true : false;

            return $this;
        }

        /**
         * Set the test if the images exist or not
         *
         * @access public
         * @param  boolean  $mode
         * @return HTML2PDF $this
         */
        public function setTestIsImage($mode = true)
        {
            $this->_testIsImage = $mode ? true : false;

            return $this;
        }

        /**
         * Set the test on deprecated functions
         *
         * @access public
         * @param  boolean  $mode
         * @return HTML2PDF $this
         */
        public function setTestIsDeprecated($mode = true)
        {
            $this->_testIsDeprecated = $mode ? true : false;

            return $this;
        }

        /**
         * Set the default font to use, if no font is specify, or if the asked font does not exist
         *
         * @access public
         * @param  string   $default name of the default font to use. If null : Arial is no font is specify, and error if the asked font does not exist
         * @return HTML2PDF $this
         */
        public function setDefaultFont($default = null)
        {
            $this->_defaultFont = $default;
            $this->parsingCss->setDefaultFont($default);

            return $this;
        }

        /**
         * add a font, see TCPDF function addFont
         *
         * @access public
         * @param string $family Font family. The name can be chosen arbitrarily. If it is a standard family name, it will override the corresponding font.
         * @param string $style Font style. Possible values are (case insensitive):<ul><li>empty string: regular (default)</li><li>B: bold</li><li>I: italic</li><li>BI or IB: bold italic</li></ul>
         * @param string $fontfile The font definition file. By default, the name is built from the family and style, in lower case with no spaces.
         * @return HTML2PDF $this
         * @see TCPDF::addFont
         */
        public function addFont($family, $style='', $file='')
        {
            $this->pdf->AddFont($family, $style, $file);

            return $this;
        }

        /**
         * display a automatic index, from the bookmarks
         *
         * @access public
         * @param  string  $titre         index title
         * @param  int     $sizeTitle     font size of the index title, in mm
         * @param  int     $sizeBookmark  font size of the index, in mm
         * @param  boolean $bookmarkTitle add a bookmark for the index, at his beginning
         * @param  boolean $displayPage   display the page numbers
         * @param  int     $onPage        if null : at the end of the document on a new page, else on the $onPage page
         * @param  string  $fontName      font name to use
         * @return null
         */
        public function createIndex($titre = 'Index', $sizeTitle = 20, $sizeBookmark = 15, $bookmarkTitle = true, $displayPage = true, $onPage = null, $fontName = 'helvetica')
        {
            $oldPage = $this->_INDEX_NewPage($onPage);
            $this->pdf->createIndex($this, $titre, $sizeTitle, $sizeBookmark, $bookmarkTitle, $displayPage, $onPage, $fontName);
            if ($oldPage) $this->pdf->setPage($oldPage);
        }

        /**
         * clean up the objects
         *
         * @access protected
         */
        protected function _cleanUp()
        {
            HTML2PDF::$_subobj = null;
            HTML2PDF::$_tables = array();
        }

        /**
         * Send the document to a given destination: string, local file or browser.
         * Dest can be :
         *  I : send the file inline to the browser (default). The plug-in is used if available. The name given by name is used when one selects the "Save as" option on the link generating the PDF.
         *  D : send to the browser and force a file download with the name given by name.
         *  F : save to a local server file with the name given by name.
         *  S : return the document as a string. name is ignored.
         *  FI: equivalent to F + I option
         *  FD: equivalent to F + D option
         *  true  => I
         *  false => S
         *
         * @param  string $name The name of the file when saved.
         * @param  string $dest Destination where to send the document.
         * @return string content of the PDF, if $dest=S
         * @see TCPDF::close
         * @access public

         */
        public function Output($name = '', $dest = false)
        {
            // close the pdf and clean up
            $this->_cleanUp();

            // if on debug mode
            if ($this->_debugActif) {
                $this->_DEBUG_add('Before output');
                $this->pdf->Close();
                exit;
            }

            // complete parameters
            if ($dest===false) $dest = 'I';
            if ($dest===true)  $dest = 'S';
            if ($dest==='')    $dest = 'I';
            if ($name=='')     $name='document.pdf';

            // clean up the destination
            $dest = strtoupper($dest);
            if (!in_array($dest, array('I', 'D', 'F', 'S', 'FI','FD'))) $dest = 'I';

            // the name must be a PDF name
            if (strtolower(substr($name, -4))!='.pdf') {
                throw new HTML2PDF_exception(0, 'The output document name "'.$name.'" is not a PDF name');
            }

            // call the output of TCPDF
            return $this->pdf->Output($name, $dest);
        }

        /**
         * convert HTML to PDF
         *
         * @access public
         * @param  string   $html
         * @param  boolean  $debugVue  enable the HTML debug vue
         * @return null
         */
        public function writeHTML($html, $debugVue = false)
        {
            // if it is a real html page, we have to convert it
            if (preg_match('/<body/isU', $html))
                $html = $this->getHtmlFromPage($html);

            $html = str_replace('[[date_y]]', date('Y'), $html);
            $html = str_replace('[[date_m]]', date('m'), $html);
            $html = str_replace('[[date_d]]', date('d'), $html);

            $html = str_replace('[[date_h]]', date('H'), $html);
            $html = str_replace('[[date_i]]', date('i'), $html);
            $html = str_replace('[[date_s]]', date('s'), $html);

            // If we are in HTML debug vue : display the HTML
            if ($debugVue) {
                return $this->_vueHTML($html);
            }

            // convert HTMl to PDF
            $this->parsingCss->readStyle($html);
            $this->parsingHtml->setHTML($html);
            $this->parsingHtml->parse();
            $this->_makeHTMLcode();
        }

        /**
         * convert the HTML of a real page, to a code adapted to HTML2PDF
         *
         * @access public
         * @param  string HTML of a real page
         * @return string HTML adapted to HTML2PDF
         */
        public function getHtmlFromPage($html)
        {
            $html = str_replace('<BODY', '<body', $html);
            $html = str_replace('</BODY', '</body', $html);

            // extract the content
            $res = explode('<body', $html);
            if (count($res)<2) return $html;
            $content = '<page'.$res[1];
            $content = explode('</body', $content);
            $content = $content[0].'</page>';

            // extract the link tags
            preg_match_all('/<link([^>]*)>/isU', $html, $match);
            foreach ($match[0] as $src)
                $content = $src.'</link>'.$content;

            // extract the css style tags
            preg_match_all('/<style[^>]*>(.*)<\/style[^>]*>/isU', $html, $match);
            foreach ($match[0] as $src)
                $content = $src.$content;

            return $content;
        }

        /**
         * init a sub HTML2PDF. does not use it directly. Only the method createSubHTML must use it
         *
         * @access public
         * @param  string  $format
         * @param  string  $orientation
         * @param  array   $marge
         * @param  integer $page
         * @param  array   $defLIST
         * @param  integer $myLastPageGroup
         * @param  integer $myLastPageGroupNb
         */
        public function initSubHtml($format, $orientation, $marge, $page, $defLIST, $myLastPageGroup, $myLastPageGroupNb)
        {
            $this->_isSubPart = true;

            $this->parsingCss->setOnlyLeft();

            $this->_setNewPage($format, $orientation, null, null, ($myLastPageGroup!==null));

            $this->_saveMargin(0, 0, $marge);
            $this->_defList = $defLIST;

            $this->_page = $page;
            $this->pdf->setMyLastPageGroup($myLastPageGroup);
            $this->pdf->setMyLastPageGroupNb($myLastPageGroupNb);
            $this->pdf->setXY(0, 0);
            $this->parsingCss->fontSet();
        }

        /**
         * display the content in HTML moden for debug
         *
         * @access protected
         * @param  string $contenu
         */
        protected function _vueHTML($content)
        {
            $content = preg_replace('/<page_header([^>]*)>/isU', '<hr>'.HTML2PDF_locale::get('vue01').' : $1<hr><div$1>', $content);
            $content = preg_replace('/<page_footer([^>]*)>/isU', '<hr>'.HTML2PDF_locale::get('vue02').' : $1<hr><div$1>', $content);
            $content = preg_replace('/<page([^>]*)>/isU', '<hr>'.HTML2PDF_locale::get('vue03').' : $1<hr><div$1>', $content);
            $content = preg_replace('/<\/page([^>]*)>/isU', '</div><hr>', $content);
            $content = preg_replace('/<bookmark([^>]*)>/isU', '<hr>bookmark : $1<hr>', $content);
            $content = preg_replace('/<\/bookmark([^>]*)>/isU', '', $content);
            $content = preg_replace('/<barcode([^>]*)>/isU', '<hr>barcode : $1<hr>', $content);
            $content = preg_replace('/<\/barcode([^>]*)>/isU', '', $content);
            $content = preg_replace('/<qrcode([^>]*)>/isU', '<hr>qrcode : $1<hr>', $content);
            $content = preg_replace('/<\/qrcode([^>]*)>/isU', '', $content);

            echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>'.HTML2PDF_locale::get('vue04').' HTML</title>
        <meta http-equiv="Content-Type" content="text/html; charset='.$this->_encoding.'" >
    </head>
    <body style="padding: 10px; font-size: 10pt;font-family:    Verdana;">
'.$content.'
    </body>
</html>';
            exit;
        }

        /**
         * set the default margins of the page
         *
         * @access protected
         * @param  int $left   (mm, left margin)
         * @param  int $top    (mm, top margin)
         * @param  int $right  (mm, right margin, if null => left=right)
         * @param  int $bottom (mm, bottom margin, if null => bottom=8mm)
         */
        protected function _setDefaultMargins($left, $top, $right = null, $bottom = null)
        {
            if ($right===null)  $right = $left;
            if ($bottom===null) $bottom = 8;

            $this->_defaultLeft   = $this->parsingCss->ConvertToMM($left.'mm');
            $this->_defaultTop    = $this->parsingCss->ConvertToMM($top.'mm');
            $this->_defaultRight  = $this->parsingCss->ConvertToMM($right.'mm');
            $this->_defaultBottom = $this->parsingCss->ConvertToMM($bottom.'mm');
        }

        /**
         * create a new page
         *
         * @access protected
         * @param  mixed   $format
         * @param  string  $orientation
         * @param  array   $background background information
         * @param  integer $curr real position in the html parseur (if break line in the write of a text)
         * @param  boolean $resetPageNumber
         */
        protected function _setNewPage($format = null, $orientation = '', $background = null, $curr = null, $resetPageNumber=false)
        {
            $this->_firstPage = false;

            $this->_format = $format ? $format : $this->_format;
            $this->_orientation = $orientation ? $orientation : $this->_orientation;
            $this->_background = $background!==null ? $background : $this->_background;
            $this->_maxY = 0;
            $this->_maxX = 0;
            $this->_maxH = 0;
            $this->_maxE = 0;

            $this->pdf->SetMargins($this->_defaultLeft, $this->_defaultTop, $this->_defaultRight);

            if ($resetPageNumber) {
                $this->pdf->startPageGroup();
            }

            $this->pdf->AddPage($this->_orientation, $this->_format);

            if ($resetPageNumber) {
                $this->pdf->myStartPageGroup();
            }

            $this->_page++;

            if (!$this->_subPart && !$this->_isSubPart) {
                if (is_array($this->_background)) {
                    if (isset($this->_background['color']) && $this->_background['color']) {
                        $this->pdf->setFillColorArray($this->_background['color']);
                        $this->pdf->Rect(0, 0, $this->pdf->getW(), $this->pdf->getH(), 'F');
                    }

                    if (isset($this->_background['img']) && $this->_background['img'])
                        $this->pdf->Image($this->_background['img'], $this->_background['posX'], $this->_background['posY'], $this->_background['width']);
                }

                $this->_setPageHeader();
                $this->_setPageFooter();
            }

            $this->_setMargins();
            $this->pdf->setY($this->_margeTop);

            $this->_setNewPositionForNewLine($curr);
            $this->_maxH = 0;
        }

        /**
         * set the real margin, using the default margins and the page margins
         *
         * @access protected
         */
        protected function _setMargins()
        {
            // prepare the margins
            $this->_margeLeft   = $this->_defaultLeft   + (isset($this->_background['left'])   ? $this->_background['left']   : 0);
            $this->_margeRight  = $this->_defaultRight  + (isset($this->_background['right'])  ? $this->_background['right']  : 0);
            $this->_margeTop    = $this->_defaultTop    + (isset($this->_background['top'])    ? $this->_background['top']    : 0);
            $this->_margeBottom = $this->_defaultBottom + (isset($this->_background['bottom']) ? $this->_background['bottom'] : 0);

            // set the PDF margins
            $this->pdf->SetMargins($this->_margeLeft, $this->_margeTop, $this->_margeRight);
            $this->pdf->SetAutoPageBreak(false, $this->_margeBottom);

            // set the float Margins
            $this->_pageMarges = array();
            if ($this->_isInParagraph!==false) {
                $this->_pageMarges[floor($this->_margeTop*100)] = array($this->_isInParagraph[0], $this->pdf->getW()-$this->_isInParagraph[1]);
            } else {
                $this->_pageMarges[floor($this->_margeTop*100)] = array($this->_margeLeft, $this->pdf->getW()-$this->_margeRight);
            }
        }

        /**
         * add a debug step
         *
         * @access protected
         * @param  string  $name step name
         * @param  boolean $level (true=up, false=down, null=nothing to do)
         * @return $this
         */
        protected function _DEBUG_add($name, $level=null)
        {
            // if true : UP
            if ($level===true) $this->_debugLevel++;

            $name   = str_repeat('  ', $this->_debugLevel). $name.($level===true ? ' Begin' : ($level===false ? ' End' : ''));
            $time  = microtime(true);
            $usage = ($this->_debugOkUsage ? memory_get_usage() : 0);
            $peak  = ($this->_debugOkPeak ? memory_get_peak_usage() : 0);

            $this->_DEBUG_stepline(
                $name,
                number_format(($time - $this->_debugStartTime)*1000, 1, '.', ' ').' ms',
                number_format(($time - $this->_debugLastTime)*1000, 1, '.', ' ').' ms',
                number_format($usage/1024, 1, '.', ' ').' Ko',
                number_format($peak/1024, 1, '.', ' ').' Ko'
            );

            $this->_debugLastTime = $time;

            // it false : DOWN
            if ($level===false) $this->_debugLevel--;

            return $this;
        }

        /**
         * display a debug line
         *
         *
         * @access protected
         * @param  string $name
         * @param  string $timeTotal
         * @param  string $timeStep
         * @param  string $memoryUsage
         * @param  string $memoryPeak
         */
        protected function _DEBUG_stepline($name, $timeTotal, $timeStep, $memoryUsage, $memoryPeak)
        {
            $txt = str_pad($name, 30, ' ', STR_PAD_RIGHT).
                    str_pad($timeTotal, 12, ' ', STR_PAD_LEFT).
                    str_pad($timeStep, 12, ' ', STR_PAD_LEFT).
                    str_pad($memoryUsage, 15, ' ', STR_PAD_LEFT).
                    str_pad($memoryPeak, 15, ' ', STR_PAD_LEFT);

            echo '<pre style="padding:0; margin:0">'.$txt.'</pre>';
        }

        /**
         * get the Min and Max X, for Y (use the float margins)
         *
         * @access protected
         * @param  float $y
         * @return array(float, float)
         */
        protected function _getMargins($y)
        {
            $y = floor($y*100);
            $x = array($this->pdf->getlMargin(), $this->pdf->getW()-$this->pdf->getrMargin());

            foreach ($this->_pageMarges as $mY => $mX)
                if ($mY<=$y) $x = $mX;

            return $x;
        }

        /**
         * Add margins, for a float
         *
         * @access protected
         * @param  string $float (left / right)
         * @param  float  $xLeft
         * @param  float  $yTop
         * @param  float  $xRight
         * @param  float  $yBottom
         */
        protected function _addMargins($float, $xLeft, $yTop, $xRight, $yBottom)
        {
            // get the current float margins, for top and bottom
            $oldTop    = $this->_getMargins($yTop);
            $oldBottom = $this->_getMargins($yBottom);

            // update the top float margin
            if ($float=='left'  && $oldTop[0]<$xRight) $oldTop[0] = $xRight;
            if ($float=='right' && $oldTop[1]>$xLeft)  $oldTop[1] = $xLeft;

            $yTop = floor($yTop*100);
            $yBottom = floor($yBottom*100);

            // erase all the float margins that are smaller than the new one
            foreach ($this->_pageMarges as $mY => $mX) {
                if ($mY<$yTop) continue;
                if ($mY>$yBottom) break;
                if ($float=='left' && $this->_pageMarges[$mY][0]<$xRight)  unset($this->_pageMarges[$mY]);
                if ($float=='right' && $this->_pageMarges[$mY][1]>$xLeft) unset($this->_pageMarges[$mY]);
            }

            // save the new Top and Bottom margins
            $this->_pageMarges[$yTop] = $oldTop;
            $this->_pageMarges[$yBottom] = $oldBottom;

            // sort the margins
            ksort($this->_pageMarges);

            // we are just after float
            $this->_isAfterFloat = true;
        }

        /**
         * Save old margins (push), and set new ones
         *
         * @access protected
         * @param  float  $ml left margin
         * @param  float  $mt top margin
         * @param  float  $mr right margin
         */
        protected function _saveMargin($ml, $mt, $mr)
        {
            // save old margins
            $this->_marges[] = array('l' => $this->pdf->getlMargin(), 't' => $this->pdf->gettMargin(), 'r' => $this->pdf->getrMargin(), 'page' => $this->_pageMarges);

            // set new ones
            $this->pdf->SetMargins($ml, $mt, $mr);

            // prepare for float margins
            $this->_pageMarges = array();
            $this->_pageMarges[floor($mt*100)] = array($ml, $this->pdf->getW()-$mr);
        }

        /**
         * load the last saved margins (pop)
         *
         * @access protected
         */
        protected function _loadMargin()
        {
            $old = array_pop($this->_marges);
            if ($old) {
                $ml = $old['l'];
                $mt = $old['t'];
                $mr = $old['r'];
                $mP = $old['page'];
            } else {
                $ml = $this->_margeLeft;
                $mt = 0;
                $mr = $this->_margeRight;
                $mP = array($mt => array($ml, $this->pdf->getW()-$mr));
            }

            $this->pdf->SetMargins($ml, $mt, $mr);
            $this->_pageMarges = $mP;
        }

        /**
         * save the current maxs (push)
         *
         * @access protected
         */
        protected function _saveMax()
        {
            $this->_maxSave[] = array($this->_maxX, $this->_maxY, $this->_maxH, $this->_maxE);
        }

        /**
         * load the last saved current maxs (pop)
         *
         * @access protected
         */
        protected function _loadMax()
        {
            $old = array_pop($this->_maxSave);

            if ($old) {
                $this->_maxX = $old[0];
                $this->_maxY = $old[1];
                $this->_maxH = $old[2];
                $this->_maxE = $old[3];
            } else {
                $this->_maxX = 0;
                $this->_maxY = 0;
                $this->_maxH = 0;
                $this->_maxE = 0;
            }
        }

        /**
         * draw the PDF header with the HTML in page_header
         *
         * @access protected
         */
        protected function _setPageHeader()
        {
            if (!count($this->_subHEADER)) return false;

            $oldParsePos = $this->_parsePos;
            $oldParseCode = $this->parsingHtml->code;

            $this->_parsePos = 0;
            $this->parsingHtml->code = $this->_subHEADER;
            $this->_makeHTMLcode();

            $this->_parsePos = $oldParsePos;
            $this->parsingHtml->code = $oldParseCode;
        }

        /**
         * draw the PDF footer with the HTML in page_footer
         *
         * @access protected
         */
        protected function _setPageFooter()
        {
            if (!count($this->_subFOOTER)) return false;

            $oldParsePos = $this->_parsePos;
            $oldParseCode = $this->parsingHtml->code;

            $this->_parsePos = 0;
            $this->parsingHtml->code = $this->_subFOOTER;
            $this->_isInFooter = true;
            $this->_makeHTMLcode();
            $this->_isInFooter = false;

            $this->_parsePos = $oldParsePos;
            $this->parsingHtml->code = $oldParseCode;
        }

        /**
         * new line, with a specific height
         *
         * @access protected
         * @param float   $h
         * @param integer $curr real current position in the text, if new line in the write of a text
         */
        protected function _setNewLine($h, $curr = null)
        {
            $this->pdf->Ln($h);
            $this->_setNewPositionForNewLine($curr);
        }

        /**
         * calculate the start position of the next line,  depending on the text-align
         *
         * @access protected
         * @param  integer $curr real current position in the text, if new line in the write of a text
         */
        protected function _setNewPositionForNewLine($curr = null)
        {
            // get the margins for the current line
            list($lx, $rx) = $this->_getMargins($this->pdf->getY());
            $this->pdf->setX($lx);
            $wMax = $rx-$lx;
            $this->_currentH = 0;

            // if subPart => return because align left
            if ($this->_subPart || $this->_isSubPart || $this->_isForOneLine) {
                $this->pdf->setWordSpacing(0);
                return null;
            }

            // create the sub object
            $sub = null;
            $this->_createSubHTML($sub);
            $sub->_saveMargin(0, 0, $sub->pdf->getW()-$wMax);
            $sub->_isForOneLine = true;
            $sub->_parsePos = $this->_parsePos;
            $sub->parsingHtml->code = $this->parsingHtml->code;

            // if $curr => adapt the current position of the parsing
            if ($curr!==null && $sub->parsingHtml->code[$this->_parsePos]['name']=='write') {
                $txt = $sub->parsingHtml->code[$this->_parsePos]['param']['txt'];
                $txt = str_replace('[[page_cu]]', $sub->pdf->getMyNumPage($this->_page), $txt);
                $sub->parsingHtml->code[$this->_parsePos]['param']['txt'] = substr($txt, $curr+1);
            } else
                $sub->_parsePos++;

            // for each element of the parsing => load the action
            $res = null;
            for ($sub->_parsePos; $sub->_parsePos<count($sub->parsingHtml->code); $sub->_parsePos++) {
                $action = $sub->parsingHtml->code[$sub->_parsePos];
                $res = $sub->_executeAction($action);
                if (!$res) break;
            }

            $w = $sub->_maxX; // max width
            $h = $sub->_maxH; // max height
            $e = ($res===null ? $sub->_maxE : 0); // maxnumber of elemets on the line

            // destroy the sub HTML
            $this->_destroySubHTML($sub);

            // adapt the start of the line, depending on the text-align
            if ($this->parsingCss->value['text-align']=='center')
                $this->pdf->setX(($rx+$this->pdf->getX()-$w)*0.5-0.01);
            else if ($this->parsingCss->value['text-align']=='right')
                $this->pdf->setX($rx-$w-0.01);
            else
                $this->pdf->setX($lx);

            // set the height of the line
            $this->_currentH = $h;

            // if justify => set the word spacing
            if ($this->parsingCss->value['text-align']=='justify' && $e>1) {
                $this->pdf->setWordSpacing(($wMax-$w)/($e-1));
            } else {
                $this->pdf->setWordSpacing(0);
            }
        }

        /**
         * prepare HTML2PDF::$_subobj (used for create the sub HTML2PDF objects
         *
         * @access protected
         */
        protected function _prepareSubObj()
        {
            $pdf = null;

            // create the sub object
            HTML2PDF::$_subobj = new HTML2PDF(
                                        $this->_orientation,
                                        $this->_format,
                                        $this->_langue,
                                        $this->_unicode,
                                        $this->_encoding,
                                        array($this->_defaultLeft,$this->_defaultTop,$this->_defaultRight,$this->_defaultBottom)
                                    );

            // init
            HTML2PDF::$_subobj->setTestTdInOnePage($this->_testTdInOnepage);
            HTML2PDF::$_subobj->setTestIsImage($this->_testIsImage);
            HTML2PDF::$_subobj->setTestIsDeprecated($this->_testIsDeprecated);
            HTML2PDF::$_subobj->setDefaultFont($this->_defaultFont);
            HTML2PDF::$_subobj->parsingCss->css            = &$this->parsingCss->css;
            HTML2PDF::$_subobj->parsingCss->cssKeys        = &$this->parsingCss->cssKeys;

            // clone font from the original PDF
            HTML2PDF::$_subobj->pdf->cloneFontFrom($this->pdf);

            // remove the link to the parent
            HTML2PDF::$_subobj->parsingCss->setPdfParent($pdf);
        }

        /**
         * create a sub HTML2PDF, to calculate the multi-tables
         *
         * @access protected
         * @param  &HTML2PDF $subHtml sub HTML2PDF to create
         * @param  integer   $cellmargin if in a TD : cellmargin of this td
         */
        protected function _createSubHTML(&$subHtml, $cellmargin=0)
        {
            // prepare the subObject, if never prepare before
            if (HTML2PDF::$_subobj===null) {
                $this->_prepareSubObj();
            }

            // calculate the width to use
            if ($this->parsingCss->value['width']) {
                $marge = $cellmargin*2;
                $marge+= $this->parsingCss->value['padding']['l'] + $this->parsingCss->value['padding']['r'];
                $marge+= $this->parsingCss->value['border']['l']['width'] + $this->parsingCss->value['border']['r']['width'];
                $marge = $this->pdf->getW() - $this->parsingCss->value['width'] + $marge;
            } else {
                $marge = $this->_margeLeft+$this->_margeRight;
            }

            // BUGFIX : we have to call the method, because of a bug in php 5.1.6
            HTML2PDF::$_subobj->pdf->getPage();

            // clone the sub oject
            $subHtml = clone HTML2PDF::$_subobj;
            $subHtml->parsingCss->table = $this->parsingCss->table;
            $subHtml->parsingCss->value = $this->parsingCss->value;
            $subHtml->initSubHtml(
                $this->_format,
                $this->_orientation,
                $marge,
                $this->_page,
                $this->_defList,
                $this->pdf->getMyLastPageGroup(),
                $this->pdf->getMyLastPageGroupNb()
            );
        }

        /**
         * destroy a subHTML2PDF
         *
         * @access protected
         */
        protected function _destroySubHTML(&$subHtml)
        {
            unset($subHtml);
            $subHtml = null;
        }

        /**
         * Convert a arabic number in roman number
         *
         * @access protected
         * @param  integer $nbArabic
         * @return string  $nbRoman
         */
        protected function _listeArab2Rom($nbArabic)
        {
            $nbBaseTen    = array('I','X','C','M');
            $nbBaseFive    = array('V','L','D');
            $nbRoman    = '';

            if ($nbArabic<1)    return $nbArabic;
            if ($nbArabic>3999) return $nbArabic;

            for ($i=3; $i>=0 ; $i--) {
                $chiffre=floor($nbArabic/pow(10, $i));
                if ($chiffre>=1) {
                    $nbArabic=$nbArabic-$chiffre*pow(10, $i);
                    if ($chiffre<=3) {
                        for ($j=$chiffre; $j>=1; $j--) {
                            $nbRoman=$nbRoman.$nbBaseTen[$i];
                        }
                    } else if ($chiffre==9) {
                        $nbRoman=$nbRoman.$nbBaseTen[$i].$nbBaseTen[$i+1];
                    } else if ($chiffre==4) {
                    $nbRoman=$nbRoman.$nbBaseTen[$i].$nbBaseFive[$i];
                    } else {
                        $nbRoman=$nbRoman.$nbBaseFive[$i];
                        for ($j=$chiffre-5; $j>=1; $j--) {
                            $nbRoman=$nbRoman.$nbBaseTen[$i];
                        }
                    }
                }
            }
            return $nbRoman;
        }

        /**
         * add a LI to the current level
         *
         * @access protected
         */
        protected function _listeAddLi()
        {
            $this->_defList[count($this->_defList)-1]['nb']++;
        }

        /**
         * get the width to use for the column of the list
         *
         * @access protected
         * @return string $width
         */
        protected function _listeGetWidth()
        {
            return '7mm';
        }

        /**
         * get the padding to use for the column of the list
         *
         * @access protected
         * @return string $padding
         */
        protected function _listeGetPadding()
        {
            return '1mm';
        }

        /**
         * get the information of the li on the current level
         *
         * @access protected
         * @return array(fontName, small size, string)
         */
        protected function _listeGetLi()
        {
            $im = $this->_defList[count($this->_defList)-1]['img'];
            $st = $this->_defList[count($this->_defList)-1]['style'];
            $nb = $this->_defList[count($this->_defList)-1]['nb'];
            $up = (substr($st, 0, 6)=='upper-');

            if ($im) return array(false, false, $im);

            switch($st)
            {
                case 'none':
                    return array('helvetica', true, ' ');

                case 'upper-alpha':
                case 'lower-alpha':
                    $str = '';
                    while ($nb>26) {
                        $str = chr(96+$nb%26).$str;
                        $nb = floor($nb/26);
                    }
                    $str = chr(96+$nb).$str;

                    return array('helvetica', false, ($up ? strtoupper($str) : $str).'.');

                case 'upper-roman':
                case 'lower-roman':
                    $str = $this->_listeArab2Rom($nb);

                    return array('helvetica', false, ($up ? strtoupper($str) : $str).'.');

                case 'decimal':
                    return array('helvetica', false, $nb.'.');

                case 'square':
                    return array('zapfdingbats', true, chr(110));

                case 'circle':
                    return array('zapfdingbats', true, chr(109));

                case 'disc':
                default:
                    return array('zapfdingbats', true, chr(108));
            }
        }

        /**
         * add a level to the list
         *
         * @access protected
         * @param  string $type  : ul, ol
         * @param  string $style : lower-alpha, ...
         * @param  string $img
         */
        protected function _listeAddLevel($type = 'ul', $style = '', $img = null)
        {
            // get the url of the image, if we want to use a image
            if ($img) {
                if (preg_match('/^url\(([^)]+)\)$/isU', trim($img), $match)) {
                    $img = $match[1];
                } else {
                    $img = null;
                }
            } else {
                $img = null;
            }

            // prepare the datas
            if (!in_array($type, array('ul', 'ol'))) $type = 'ul';
            if (!in_array($style, array('lower-alpha', 'upper-alpha', 'upper-roman', 'lower-roman', 'decimal', 'square', 'circle', 'disc', 'none'))) $style = '';

            if (!$style) {
                if ($type=='ul')    $style = 'disc';
                else                $style = 'decimal';
            }

            // add the new level
            $this->_defList[count($this->_defList)] = array('style' => $style, 'nb' => 0, 'img' => $img);
        }

        /**
         * remove a level to the list
         *
         * @access protected
         */
        protected function _listeDelLevel()
        {
            if (count($this->_defList)) {
                unset($this->_defList[count($this->_defList)-1]);
                $this->_defList = array_values($this->_defList);
            }
        }

        /**
         * execute the actions to convert the html
         *
         * @access protected
         */
        protected function _makeHTMLcode()
        {
            // foreach elements of the parsing
            for ($this->_parsePos=0; $this->_parsePos<count($this->parsingHtml->code); $this->_parsePos++) {

                // get the action to do
                $action = $this->parsingHtml->code[$this->_parsePos];

                // if it is a opening of table / ul / ol
                if (in_array($action['name'], array('table', 'ul', 'ol')) && !$action['close']) {

                    //  we will work as a sub HTML to calculate the size of the element
                    $this->_subPart = true;

                    // get the name of the opening tag
                    $tagOpen = $action['name'];

                    // save the actual pos on the parsing
                    $this->_tempPos = $this->_parsePos;

                    // foreach elements, while we are in the opened tag
                    while (isset($this->parsingHtml->code[$this->_tempPos]) && !($this->parsingHtml->code[$this->_tempPos]['name']==$tagOpen && $this->parsingHtml->code[$this->_tempPos]['close'])) {
                        // make the action
                        $this->_executeAction($this->parsingHtml->code[$this->_tempPos]);
                        $this->_tempPos++;
                    }

                    // execute the closure of the tag
                    if (isset($this->parsingHtml->code[$this->_tempPos])) {
                        $this->_executeAction($this->parsingHtml->code[$this->_tempPos]);
                    }

                    // end of the sub part
                    $this->_subPart = false;
                }

                // execute the action
                $this->_executeAction($action);
            }
        }

        /**
         * execute the action from the parsing
         *
         * @access protected
         * @param  array $action
         */
        protected function _executeAction($action)
        {
            // name of the action
            $fnc = ($action['close'] ? '_tag_close_' : '_tag_open_').strtoupper($action['name']);

            // parameters of the action
            $param = $action['param'];

            // if it the first action of the first page, and if it is not a open tag of PAGE => create the new page
            if ($fnc!='_tag_open_PAGE' && $this->_firstPage) {
                $this->_setNewPage();
            }

            // the action must exist
            if (!is_callable(array(&$this, $fnc))) {
                throw new HTML2PDF_exception(1, strtoupper($action['name']), $this->parsingHtml->getHtmlErrorCode($action['html_pos']));
            }

            // lauch the action
            $res = $this->{$fnc}($param);

            // save the name of the action
            $this->_previousCall = $fnc;

            // return the result
            return $res;
        }

        /**
         * get the position of the element on the current line, depending on his height
         *
         * @access protected
         * @param  float $h
         * @return float
         */
        protected function _getElementY($h)
        {
            if ($this->_subPart || $this->_isSubPart || !$this->_currentH || $this->_currentH<$h)
                return 0;

            return ($this->_currentH-$h)*0.8;
        }

        /**
         * make a break line
         *
         * @access protected
         * @param  float $h current line height
         * @param  integer $curr real current position in the text, if new line in the write of a text
         */
        protected function _makeBreakLine($h, $curr = null)
        {
            if ($h) {
                if (($this->pdf->getY()+$h<$this->pdf->getH() - $this->pdf->getbMargin()) || $this->_isInOverflow || $this->_isInFooter)
                    $this->_setNewLine($h, $curr);
                else
                    $this->_setNewPage(null, '', null, $curr);
            } else {
                $this->_setNewPositionForNewLine($curr);
            }

            $this->_maxH = 0;
            $this->_maxE = 0;
        }

        /**
         * display a image
         *
         * @access protected
         * @param  string $src
         * @param  boolean $subLi if true=image of a list
         * @return boolean depending on "isForOneLine"
         */
        protected function _drawImage($src, $subLi=false)
        {
            // get the size of the image
            // WARNING : if URL, "allow_url_fopen" must turned to "on" in php.ini
            $infos=@getimagesize($src);

            // if the image does not exist, or can not be loaded
            if (count($infos)<2) {
                // if the test is activ => exception
                if ($this->_testIsImage) {
                    throw new HTML2PDF_exception(6, $src);
                }

                // else, display a gray rectangle
                $src = null;
                $infos = array(16, 16);
            }

            // convert the size of the image in the unit of the PDF
            $imageWidth = $infos[0]/$this->pdf->getK();
            $imageHeight = $infos[1]/$this->pdf->getK();

            // calculate the size from the css style
            if ($this->parsingCss->value['width'] && $this->parsingCss->value['height']) {
                $w = $this->parsingCss->value['width'];
                $h = $this->parsingCss->value['height'];
            } else if ($this->parsingCss->value['width']) {
                $w = $this->parsingCss->value['width'];
                $h = $imageHeight*$w/$imageWidth;
            } else if ($this->parsingCss->value['height']) {
                $h = $this->parsingCss->value['height'];
                $w = $imageWidth*$h/$imageHeight;
            } else {
                // convert px to pt
                $w = 72./96.*$imageWidth;
                $h = 72./96.*$imageHeight;
            }

            // are we in a float
            $float = $this->parsingCss->getFloat();

            // if we are in a float, but if something else if on the line => Break Line
            if ($float && $this->_maxH) {
                // make the break line (false if we are in "_isForOneLine" mode)
                if (!$this->_tag_open_BR(array())) {
                    return false;
                }
            }

            // position of the image
            $x = $this->pdf->getX();
            $y = $this->pdf->getY();

            // if the image can not be put on the current line => new line
            if (!$float && ($x + $w>$this->pdf->getW() - $this->pdf->getrMargin()) && $this->_maxH) {
                if ($this->_isForOneLine) {
                    return false;
                }

                // set the new line
                $hnl = max($this->_maxH, $this->parsingCss->getLineHeight());
                $this->_setNewLine($hnl);

                // get the new position
                $x = $this->pdf->getX();
                $y = $this->pdf->getY();
            }

            // if the image can not be put on the current page
            if (($y + $h>$this->pdf->getH() - $this->pdf->getbMargin()) && !$this->_isInOverflow) {
                // new page
                $this->_setNewPage();

                // get the new position
                $x = $this->pdf->getX();
                $y = $this->pdf->getY();
            }

            // correction for display the image of a list
            $hT = 0.80*$this->parsingCss->value['font-size'];
            if ($subLi && $h<$hT) {
                $y+=($hT-$h);
            }

            // add the margin top
            $yc = $y-$this->parsingCss->value['margin']['t'];

            // get the width and the position of the parent
            $old = $this->parsingCss->getOldValues();
            if ( $old['width']) {
                $parentWidth = $old['width'];
                $parentX = $x;
            } else {
                $parentWidth = $this->pdf->getW() - $this->pdf->getlMargin() - $this->pdf->getrMargin();
                $parentX = $this->pdf->getlMargin();
            }

            // if we are in a gloat => adapt the parent position and width
            if ($float) {
                list($lx, $rx) = $this->_getMargins($yc);
                $parentX = $lx;
                $parentWidth = $rx-$lx;
            }

            // calculate the position of the image, if align to the right
            if ($parentWidth>$w && $float!='left') {
                if ($float=='right' || $this->parsingCss->value['text-align']=='li_right')    $x = $parentX + $parentWidth - $w-$this->parsingCss->value['margin']['r']-$this->parsingCss->value['margin']['l'];
            }

            // display the image
            if (!$this->_subPart && !$this->_isSubPart) {
                if ($src) {
                    $this->pdf->Image($src, $x, $y, $w, $h, '', $this->_isInLink);
                } else {
                    // rectangle if the image can not be loaded
                    $this->pdf->setFillColorArray(array(240, 220, 220));
                    $this->pdf->Rect($x, $y, $w, $h, 'F');
                }
            }

            // apply the margins
            $x-= $this->parsingCss->value['margin']['l'];
            $y-= $this->parsingCss->value['margin']['t'];
            $w+= $this->parsingCss->value['margin']['l'] + $this->parsingCss->value['margin']['r'];
            $h+= $this->parsingCss->value['margin']['t'] + $this->parsingCss->value['margin']['b'];

            if ($float=='left') {
                // save the current max
                $this->_maxX = max($this->_maxX, $x+$w);
                $this->_maxY = max($this->_maxY, $y+$h);

                // add the image to the margins
                $this->_addMargins($float, $x, $y, $x+$w, $y+$h);

                // get the new position
                list($lx, $rx) = $this->_getMargins($yc);
                $this->pdf->setXY($lx, $yc);
            } else if ($float=='right') {
                // save the current max. We don't save the X because it is not the real max of the line
                $this->_maxY = max($this->_maxY, $y+$h);

                // add the image to the margins
                $this->_addMargins($float, $x, $y, $x+$w, $y+$h);

                // get the new position
                list($lx, $rx) = $this->_getMargins($yc);
                $this->pdf->setXY($lx, $yc);
            } else {
                // set the new position at the end of the image
                $this->pdf->setX($x+$w);

                // save the current max
                $this->_maxX = max($this->_maxX, $x+$w);
                $this->_maxY = max($this->_maxY, $y+$h);
                $this->_maxH = max($this->_maxH, $h);
            }

            return true;
        }

        /**
         * draw a rectangle
         *
         * @access protected
         * @param  float $x
         * @param  float $y
         * @param  float $w
         * @param  float $h
         * @param  array $border
         * @param  float $padding - internal marge of the rectanble => not used, but...
         * @param  float $margin  - external marge of the rectanble
         * @param  array $background
         * @return boolean
         */
        protected function _drawRectangle($x, $y, $w, $h, $border, $padding, $margin, $background)
        {
            // if we are in a subpart or if height is null => return false
            if ($this->_subPart || $this->_isSubPart || $h===null) return false;

            // add the margin
            $x+= $margin;
            $y+= $margin;
            $w-= $margin*2;
            $h-= $margin*2;

            // get the radius of the border
            $outTL = $border['radius']['tl'];
            $outTR = $border['radius']['tr'];
            $outBR = $border['radius']['br'];
            $outBL = $border['radius']['bl'];

            // prepare the out radius
            $outTL = ($outTL[0] && $outTL[1]) ? $outTL : null;
            $outTR = ($outTR[0] && $outTR[1]) ? $outTR : null;
            $outBR = ($outBR[0] && $outBR[1]) ? $outBR : null;
            $outBL = ($outBL[0] && $outBL[1]) ? $outBL : null;

            // prepare the in radius
            $inTL = $outTL;
            $inTR = $outTR;
            $inBR = $outBR;
            $inBL = $outBL;

            if (is_array($inTL)) {
                $inTL[0]-= $border['l']['width'];
 