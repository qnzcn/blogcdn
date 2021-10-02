<?php

/* @galleries/settings.twig */
class __TwigTemplate_de624ec8f5afe036072c77baffce33cb174cffd146e0955fc8ab3c063ce97d53 extends Twig_SupTwg_Template
{
    public function __construct(Twig_SupTwg_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("grid-gallery.twig", "@galleries/settings.twig", 1);
        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'tabs' => array($this, 'block_tabs'),
            'preview' => array($this, 'block_preview'),
            'figcaption_after' => array($this, 'block_figcaption_after'),
            'gallery_preview_figure_attributes' => array($this, 'block_gallery_preview_figure_attributes'),
            'gallery_preview_image_attributes' => array($this, 'block_gallery_preview_image_attributes'),
            'settginsFigCaption' => array($this, 'block_settginsFigCaption'),
            'content' => array($this, 'block_content'),
            'proHiddenSettings' => array($this, 'block_proHiddenSettings'),
            'area' => array($this, 'block_area'),
            'galleryTypeSelectorItems' => array($this, 'block_galleryTypeSelectorItems'),
            'openByLink' => array($this, 'block_openByLink'),
            'browserUrlTooltipHide' => array($this, 'block_browserUrlTooltipHide'),
            'disableRightClick' => array($this, 'block_disableRightClick'),
            'mosaicImagesCount' => array($this, 'block_mosaicImagesCount'),
            'mosaicGalleryImageCountText' => array($this, 'block_mosaicGalleryImageCountText'),
            'socialSharing' => array($this, 'block_socialSharing'),
            'horizontalScroll' => array($this, 'block_horizontalScroll'),
            'horizontalScrollAfter' => array($this, 'block_horizontalScrollAfter'),
            'border' => array($this, 'block_border'),
            'shadow' => array($this, 'block_shadow'),
            'popup' => array($this, 'block_popup'),
            'popupLinkedImageText' => array($this, 'block_popupLinkedImageText'),
            'disableSourceImageForLi' => array($this, 'block_disableSourceImageForLi'),
            'enableDownloadPhotosButton' => array($this, 'block_enableDownloadPhotosButton'),
            'popupAfter' => array($this, 'block_popupAfter'),
            'lazyload' => array($this, 'block_lazyload'),
            'preload' => array($this, 'block_preload'),
            'attributes' => array($this, 'block_attributes'),
            'additionalCaptionSettings' => array($this, 'block_additionalCaptionSettings'),
            'post' => array($this, 'block_post'),
            'captionSettingsType' => array($this, 'block_captionSettingsType'),
            'overlaySettings' => array($this, 'block_overlaySettings'),
            'backgroundImageForHoverEffect' => array($this, 'block_backgroundImageForHoverEffect'),
            'backgroundColorForShowOnHover' => array($this, 'block_backgroundColorForShowOnHover'),
            'icons' => array($this, 'block_icons'),
            'proCaptionAndIconSettings' => array($this, 'block_proCaptionAndIconSettings'),
            'exifCaptionSettings' => array($this, 'block_exifCaptionSettings'),
            'categories' => array($this, 'block_categories'),
            'pagination' => array($this, 'block_pagination'),
            'watermark' => array($this, 'block_watermark'),
            'form' => array($this, 'block_form'),
            'captionEffectInPro' => array($this, 'block_captionEffectInPro'),
            'iconsEffects' => array($this, 'block_iconsEffects'),
            'modals' => array($this, 'block_modals'),
            'icon_wrap_item_class' => array($this, 'block_icon_wrap_item_class'),
            'settingsOtherPro' => array($this, 'block_settingsOtherPro'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "grid-gallery.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 5
        $context["borderTypes"] = array("solid" => "Solid", "dotted" => "Dotted", "dashed" => "Dashed", "double" => "Double", "groove" => "Groove", "ridge" => "Ridge", "inset" => "Inset", "outset" => "Outset", "none" => "None");
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 17
    public function block_header($context, array $blocks = array())
    {
        // line 18
        echo "    ";
        // line 19
        echo "    <nav id=\"supsystic-breadcrumbs\" class=\"supsystic-breadcrumbs\" style=\"float: left; padding-top: 20px;\">
        ";
        // line 38
        echo "        ";
        // line 39
        echo "        ";
        // line 40
        echo "        <a href=\"";
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute(($context["environment"] ?? null), "generateUrl", array(0 => "galleries"), "method"), "html", null, true);
        echo "\">";
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Galleries")), "html", null, true);
        echo "</a>
        <i class=\"fa fa-angle-right\"></i>
        <a href=\"";
        // line 42
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute(($context["environment"] ?? null), "generateUrl", array(0 => "galleries", 1 => "view", 2 => array("gallery_id" => $this->getAttribute(($context["gallery"] ?? null), "id", array()))), "method"), "html", null, true);
        echo "\">";
        echo $this->getAttribute(($context["gallery"] ?? null), "title", array());
        echo "</a>
    </nav>

    <h2 class=\"form-tabs\">
        <a class=\"nav-tab change-tab\" href=\"area\">
            <i class=\"fa fa-home\"></i>
\t\t\t<span class=\"nav-tab-item-span\">";
        // line 48
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Main")), "html", null, true);
        echo "</span>
        </a>

        <a class=\"nav-tab change-tab\" href=\"overlay\">
            <i class=\"fa fa-info\"></i>
\t\t\t<span class=\"nav-tab-item-span\">";
        // line 53
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Captions and icons")), "html", null, true);
        echo "</span>
        </a>

        <a class=\"nav-tab change-tab\" href=\"cats\">
            <i class=\"fa fa-bookmark-o\"></i>
\t\t\t<span class=\"nav-tab-item-span\">";
        // line 58
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Categories and Pagination")), "html", null, true);
        echo "</span>
        </a>

        <a class=\"nav-tab change-tab\" href=\"post\">
            <i class=\"fa fa-columns\"></i>
\t\t\t<span class=\"nav-tab-item-span\">";
        // line 63
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Posts")), "html", null, true);
        echo "</span>
        </a>

        <a class=\"nav-tab change-tab\" href=\"water-m-tab\">
            <i class=\"fa fa-fw fa-certificate\"></i>
\t\t\t<span class=\"nav-tab-item-span\">";
        // line 68
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Watermark")), "html", null, true);
        echo "</span>
        </a>
        ";
        // line 70
        $this->displayBlock('tabs', $context, $blocks);
        // line 71
        echo "    </h2>
";
    }

    // line 70
    public function block_tabs($context, array $blocks = array())
    {
    }

    // line 74
    public function block_preview($context, array $blocks = array())
    {
        // line 75
        echo "    ";
        if ($this->getAttribute(($context["settings"] ?? null), "watermark", array(), "any", true, true)) {
            // line 76
            echo "        ";
            $context["settingsWatermark"] = Twig_SupTwg_array_merge($this->getAttribute(($context["settings"] ?? null), "watermark", array()), array("galleryId" => $this->getAttribute(($context["gallery"] ?? null), "id", array())));
            // line 77
            echo "        ";
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('set_attachment_settings')->getCallable(), array("watermark", ($context["settingsWatermark"] ?? null))), "html", null, true);
            echo "
    ";
        }
        // line 79
        echo "    ";
        $context["style"] = $this->loadTemplate("@galleries/shortcode/style.twig", "@galleries/settings.twig", 79);
        // line 80
        echo "    ";
        $context["attachment"] = $this->loadTemplate("@galleries/helpers/attachment.twig", "@galleries/settings.twig", 80);
        // line 81
        echo "\t";
        $context["form"] = $this->loadTemplate("@core/form.twig", "@galleries/settings.twig", 81);
        // line 82
        echo "
\t";
        // line 83
        ob_start();
        // line 84
        echo "\t\t";
        $this->displayBlock('figcaption_after', $context, $blocks);
        // line 86
        echo "\t";
        $context["var_figcaption_after"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
        // line 87
        echo "\t";
        // line 88
        echo "\t";
        ob_start();
        // line 89
        echo "\t\t<div class=\"sggFigCaptionIconsEntry ggSettingsDisplNone

\t\t\thi-icon-wrap ";
        // line 91
        echo " ";
        echo " ";
        echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_slice($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "effect", array()), 0, (($context["length"] ?? null) - 1)), "html", null, true);
        echo " ";
        echo " ";
        echo " ";
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "effect", array()), "html", null, true);
        echo "\">

\t\t\t";
        // line 93
        $context["videoIcon"] = ((Twig_SupTwg_in_filter("youtu", $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gallery"] ?? null), "photos", array()), 0, array(), "array"), "attachment", array()), "video", array()))) ? ("fa-youtube-play") : ("fa-vimeo"));
        // line 94
        echo "\t\t\t";
        ob_start();
        // line 95
        echo "\t\t\t\t";
        if ( !Twig_SupTwg_test_empty($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "margin", array()))) {
            // line 96
            echo "\t\t\t\t\tmargin-left:";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "margin", array()), "html", null, true);
            echo "px;
\t\t\t\t\tmargin-right:";
            // line 97
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "margin", array()), "html", null, true);
            echo "px;
\t\t\t\t";
        }
        // line 99
        echo "\t\t\t";
        $context["iconStyle"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
        // line 100
        echo "\t\t\t<a href=\"#\" class=\"hi-icon gg-icon-video fa ";
        echo " ";
        echo " ";
        echo Twig_SupTwg_escape_filter($this->env, ($context["videoIcon"] ?? null), "html", null, true);
        echo "\" style=\"";
        echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter(($context["iconStyle"] ?? null)), "html", null, true);
        echo "\"></a>
\t\t\t<a href=\"#\" class=\"hi-icon gg-icon-link fa fa-link\" style=\"";
        // line 101
        echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter(($context["iconStyle"] ?? null)), "html", null, true);
        echo "\"></a>
\t\t\t<a href=\"#\" class=\"hi-icon gg-icon-popup fa fa-expand\" style=\"";
        // line 102
        echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter(($context["iconStyle"] ?? null)), "html", null, true);
        echo "\"></a>
            <a href=\"#\" class=\"hi-icon gg-icon-download fa fa-download\" style=\"";
        // line 103
        echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter(($context["iconStyle"] ?? null)), "html", null, true);
        echo "\"></a>
\t\t</div>
\t";
        $context["simpleIconsEntryVal"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
        // line 106
        echo "
    <div id=\"preview\" class=\"gallery-preview\">
        <section class=\"supsystic-bar-preview\" id=\"single-gallery-toolbar\">
            <ul class=\"supsystic-bar-controls\">
                ";
        // line 117
        echo "
                <li title=\"";
        // line 118
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Upload new images")), "html", null, true);
        echo "\">
                    <button class=\"button button-primary gallery import-to-gallery\" data-gallery-id=\"";
        // line 119
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute(($context["gallery"] ?? null), "id", array()), "html", null, true);
        echo "\">
                        <i class=\"fa fa-fw fa-camera\"></i>
                        ";
        // line 121
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Add Images")), "html", null, true);
        echo "
                    </button>
                </li>

                <li>
                    <a class=\"button\"
                       href=\"";
        // line 127
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute(($context["environment"] ?? null), "generateUrl", array(0 => "galleries", 1 => "view", 2 => array("gallery_id" => $this->getAttribute(($context["gallery"] ?? null), "id", array()))), "method"), "html", null, true);
        echo "\">
                        <i class=\"fa fa-list fa-fw\"></i>
                        ";
        // line 129
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Images list")), "html", null, true);
        echo "
                    </a>
                </li>

                <li>
                    <button class=\"button button-primary\" id=\"btnSave\">
                        <i class=\"fa fa-fw fa-check\"></i>
                        ";
        // line 136
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Save")), "html", null, true);
        echo "
                    </button>
                </li>
            </ul>
        </section>
        ";
        // line 141
        if ( !Twig_SupTwg_test_empty($this->getAttribute(($context["gallery"] ?? null), "photos", array()))) {
            // line 142
            echo "            <div style=\"
            ";
            // line 143
            if ((($this->getAttribute($this->getAttribute($this->getAttribute(($context["gallery"] ?? null), "settings", array()), "area", array()), "photo_width_unit", array()) == 0) &&  !Twig_SupTwg_test_empty($this->getAttribute($this->getAttribute($this->getAttribute(($context["gallery"] ?? null), "settings", array()), "area", array()), "photo_width", array())))) {
                // line 144
                echo "                width:";
                echo Twig_SupTwg_escape_filter($this->env, ($this->getAttribute($this->getAttribute($this->getAttribute(($context["gallery"] ?? null), "settings", array()), "area", array()), "photo_width", array()) + 40), "html", null, true);
                echo "px;
            ";
            }
            // line 146
            echo "            margin: 10px auto;
            max-width: 330px;
            clear:both;
            \">
                <figure
\t\t\t\t\t";
            // line 151
            $this->displayBlock('gallery_preview_figure_attributes', $context, $blocks);
            // line 157
            echo "\t\t\t\t\t>
\t\t\t\t\t";
            // line 158
            list($context["width"], $context["height"], $context["crop"]) =             array(0, 0, 0);
            // line 159
            echo "
                    ";
            // line 160
            if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_width_unit", array()) == 0)) {
                // line 161
                echo "                        ";
                $context["width"] = $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_width", array());
                // line 162
                echo "                    ";
            }
            // line 163
            echo "
                    ";
            // line 164
            if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_height_unit", array()) == 0)) {
                // line 165
                echo "                        ";
                $context["height"] = $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_height", array());
                // line 166
                echo "                    ";
            }
            // line 167
            echo "
                    ";
            // line 168
            if (((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "grid", array()) == 0) || ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "grid", array()) == "2")) || ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "grid", array()) == "3"))) {
                // line 169
                echo "                        ";
                $context["crop"] = 1;
                // line 170
                echo "                    ";
            } else {
                // line 171
                echo "                        ";
                $context["height"] = 0;
                // line 172
                echo "                    ";
            }
            // line 173
            echo "
                    ";
            // line 174
            if ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "cropQuality", array(), "any", true, true)) {
                // line 175
                echo "                        ";
                $context["cropQuality"] = $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "cropQuality", array());
                // line 176
                echo "                    ";
            } else {
                // line 177
                echo "                        ";
                $context["cropQuality"] = null;
                // line 178
                echo "                    ";
            }
            // line 179
            echo "                    <img
\t\t\t\t\t\t";
            // line 180
            $this->displayBlock('gallery_preview_image_attributes', $context, $blocks);
            // line 201
            echo "\t\t\t\t\t\t/>
\t\t\t\t\t";
            // line 202
            ob_start();
            // line 203
            echo "\t\t\t\t\t\t<figcaption style=\"";
            echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter(($context["figcaptionStyle"] ?? null)), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t<div style=\"display: table; height: 100%; width: 100%;\" class=\"sggFigcaptionCaptionWrapper\">
\t\t\t\t\t\t\t\t<div class=\"grid-gallery-figcaption-wrap\" style=\"display: table-cell;\">
\t\t\t\t\t\t\t\t\t<span ";
            // line 206
            if (($this->getAttribute(($context["settings"] ?? null), "rtl", array()) == true)) {
                echo "dir=\"rtl\" class=\"ggRtlClass\"";
            }
            echo ">Gallery by Supsystic</span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
            // line 209
            echo Twig_SupTwg_escape_filter($this->env, ($context["simpleIconsEntryVal"] ?? null), "html", null, true);
            echo "
\t\t\t\t\t\t</figcaption>
\t\t\t\t\t\t";
            // line 211
            echo Twig_SupTwg_escape_filter($this->env, ($context["var_figcaption_after"] ?? null), "html", null, true);
            echo "
\t\t\t\t\t";
            $context["figcaptionBlockFree"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
            // line 213
            echo "
\t\t\t\t\t";
            // line 214
            $this->displayBlock('settginsFigCaption', $context, $blocks);
            // line 217
            echo "                </figure>
            </div>
        ";
        } else {
            // line 220
            echo "            <div style=\"clear: both;\"></div>
            <h2 style=\"text-align: center;\">
                ";
            // line 222
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("There're no images in the gallery.")), "html", null, true);
            echo "<br>
                <a class=\"import-to-gallery\" href=\"#\">Add Images</a>
            </h2>
        ";
        }
        // line 226
        echo "
        <div style=\"clear: both;\"></div>

        <div class=\"shortcode-wrap\" style=\"margin-top: 20px\">
\t\t\t<div class=\"shortcode\">";
        // line 230
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Shortcode:")), "html", null, true);
        echo "
\t\t\t\t<input type=\"text\" id=\"shortcode\" class=\"gallery-shortcode\" value=\"[";
        // line 231
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["environment"] ?? null), "config", array()), "get", array(0 => "shortcode_name"), "method"), "html", null, true);
        echo " id=";
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute(($context["gallery"] ?? null), "id", array()), "html", null, true);
        echo "]\" onclick=\"this.select();\" size=\"42\" style=\"font-size: 12px;\" readonly>
\t\t\t\t";
        // line 232
        echo $context["form"]->getshow_tooltip("sgg-shortcode");
        echo "
\t\t\t</div>
\t\t\t<div class=\"shortcode\">";
        // line 234
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("PHPCode:")), "html", null, true);
        echo "
\t\t\t\t<input type=\"text\" id=\"shortcode\" class=\"gallery-shortcode\" value=\"";
        // line 235
        echo Twig_SupTwg_escape_filter($this->env, (("<?php echo do_shortcode('[supsystic-gallery id=" . $this->getAttribute(($context["gallery"] ?? null), "id", array())) . "]') ?>"), "html", null, true);
        echo "\" onclick=\"this.select();\" size=\"42\" style=\"font-size: 12px;\" readonly>
\t\t\t\t";
        // line 236
        echo $context["form"]->getshow_tooltip("sgg-php-code");
        echo "
\t\t\t</div>
        </div>

        <small style=\"left:25px;position:absolute;top:10px;display:none;\">Oops! Transparency doesn't work in live preview. </small>
        <div class=\"separator\"></div>

        <div style=\"margin: 20px 0\" class=\"gg-preview-bottom-bar\">
\t\t\t<a class=\"button button-primary\" target=\"_blank\"
\t\t\t   href=\"";
        // line 245
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute(($context["environment"] ?? null), "generateUrl", array(0 => "galleries", 1 => "preview", 2 => array("gallery_id" => $this->getAttribute(($context["gallery"] ?? null), "id", array()))), "method"), "html", null, true);
        echo "\">
\t\t\t\t<i class=\"fa fa-fw fa-eye\"></i>
\t\t\t\t";
        // line 247
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Preview")), "html", null, true);
        echo "
\t\t\t</a>

            <a class=\"button\" id=\"openSettingsImportDialog\" href=\"\"><i class=\"fa fa-copy\"></i> ";
        // line 250
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Import settings")), "html", null, true);
        echo "</a>
\t\t\t<a class=\"button\" id=\"ggCreateClone\" href=\"#\" target=\"_blank\" data-url=\"";
        // line 251
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute(($context["environment"] ?? null), "generateUrl", array(0 => "galleries", 1 => "settings", 2 => array("_wpnonce" => ($context["_wpnonce"] ?? null))), "method"), "html", null, true);
        echo "\">
\t\t\t\t<i class=\"fa fa-clone\"></i>
\t\t\t\t";
        // line 253
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Clone")), "html", null, true);
        echo "
\t\t\t</a>
        </div>
\t\t<div class=\"gg-sett-preview-other-plugin\">
\t\t\t<label for=\"enableForMembership\" class=\"gg-sett-plugin-member-lbl\">";
        // line 257
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable for Membership:")), "html", null, true);
        echo "</label>
\t\t\t";
        // line 258
        if (($this->getAttribute(($context["pageOptions"] ?? null), "isMembershipPluginActive", array()) == "true")) {
            // line 259
            echo "\t\t\t\t<select id=\"enableForMembership\" style=\"width: auto;\" name=\"plugins[membership][enable]\" ";
            echo Twig_SupTwg_escape_filter($this->env, ($context["disableMembershipOpt"] ?? null), "html", null, true);
            echo " >
\t\t\t\t\t<option value=\"0\" ";
            // line 260
            if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "plugins", array()), "membership", array()), "enable", array()) == "0")) {
                echo "selected=\"selected\"";
            }
            echo ">
\t\t\t\t\t\t";
            // line 261
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("No")), "html", null, true);
            echo "
\t\t\t\t\t</option>
\t\t\t\t\t<option value=\"1\" ";
            // line 263
            if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "plugins", array()), "membership", array()), "enable", array()) == "1")) {
                echo "selected=\"selected\"";
            }
            echo ">
\t\t\t\t\t\t";
            // line 264
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Yes")), "html", null, true);
            echo "
\t\t\t\t\t</option>
\t\t\t\t</select>
\t\t\t";
        } else {
            // line 268
            echo "                <select id=\"enableForMembershipFake\" style=\"width: auto;\" name=\"membership_feick\" >
                    <option value=\"0\" selected=\"selected\">
                        ";
            // line 270
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("No")), "html", null, true);
            echo "
                    </option>
                    <option value=\"1\">
                        ";
            // line 273
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Yes")), "html", null, true);
            echo "
                    </option>
                </select>
\t\t\t\t<div class=\"gg-membership-plug-info\" style=\"display: none;\">
\t\t\t\t\t";
            // line 277
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("You need to install Membership by Supsystic to use this feature. ")), "html", null, true);
            echo "
\t\t\t\t\t<a target=\"_blank\" href=\"";
            // line 278
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute(($context["pageOptions"] ?? null), "membershipInstallUrl", array()), "html", null, true);
            echo "\">Install</a>
\t\t\t\t\t";
            // line 279
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array(" plugin from your admin area, or visit it's official page on Wordpress.org ")), "html", null, true);
            echo "
\t\t\t\t\t<a target=\"_blank\" href=\"";
            // line 280
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute(($context["pageOptions"] ?? null), "membershipInstallWpUrl", array()), "html", null, true);
            echo "\">here</a>
\t\t\t\t</div>
\t\t\t";
        }
        // line 283
        echo "\t\t</div>
    </div>
\t<input type=\"hidden\" id=\"ggMsgCloningGallery\" value=\"";
        // line 285
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Cloning gallery...")), "html", null, true);
        echo "\"/>
\t<input type=\"hidden\" id=\"ggMsgServerInternalError\" value=\"";
        // line 286
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Server internal error")), "html", null, true);
        echo "\"/>
\t<input type=\"hidden\" id=\"ggMsgImgOptimizationErrorOcured\" value=\"";
        // line 287
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Gallery image optimization error ocured.")), "html", null, true);
        echo "\"/>
\t<input type=\"hidden\" id=\"ggIoParams\" value=\"";
        // line 288
        echo Twig_SupTwg_escape_filter($this->env, ($context["ioServiceParams"] ?? null), "html", null, true);
        echo "\"/>
\t<input type=\"hidden\" id=\"ggCdnParams\" value=\"";
        // line 289
        echo Twig_SupTwg_escape_filter($this->env, ($context["cdnServiceParams"] ?? null), "html", null, true);
        echo "\"/>
\t<input type=\"hidden\" id=\"ggMsgOptimized\" value=\"";
        // line 290
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Optimized")), "html", null, true);
        echo "\"/>
\t<input type=\"hidden\" id=\"ggMsgTransfer\" value=\"";
        // line 291
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Transfered")), "html", null, true);
        echo "\"/>
\t<input type=\"hidden\" id=\"ggMsgOf\" value=\"";
        // line 292
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("of")), "html", null, true);
        echo "\"/>
\t<input type=\"hidden\" id=\"ggMsgImages\" value=\"";
        // line 293
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("images")), "html", null, true);
        echo "\"/>
\t<input type=\"hidden\" id=\"ggMsgGalleryImageOptimizing\" value=\"";
        // line 294
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Gallery Image optimizing...")), "html", null, true);
        echo "\"/>
\t<input type=\"hidden\" id=\"ggMsgGalleryTransferToCnd\" value=\"";
        // line 295
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Tranfer images to CDN")), "html", null, true);
        echo "\"/>

\t<div id=\"ggCloneModalWndId\" style=\"display: none;\">
\t\t<label for=\"ggCloneTypeSelector\">";
        // line 298
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select clone type:")), "html", null, true);
        echo "</label>
\t\t";
        // line 299
        echo $context["form"]->getselect("CloneTypeSelector", array("0" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select clone type")), "1" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Clone with images")), "2" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Clone without images"))), 0, array("style" => "width: auto;", "id" => "ggCloneTypeSelector"));
        // line 307
        echo "
\t</div>

";
    }

    // line 84
    public function block_figcaption_after($context, array $blocks = array())
    {
        // line 85
        echo "\t\t";
    }

    // line 151
    public function block_gallery_preview_figure_attributes($context, array $blocks = array())
    {
        // line 152
        echo "\t\t\t\t\t\tclass=\"grid-gallery-caption\" data-grid-gallery-type=\"center\" style=\"float: none !important;\"
\t\t\t\t\t\t";
        // line 153
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "personal", array()) == "true")) {
            // line 154
            echo "\t\t\t\t\t\t\tdata-thumb-overlay-personal=\"1\"
\t\t\t\t\t\t";
        }
        // line 156
        echo "\t\t\t\t\t";
    }

    // line 180
    public function block_gallery_preview_image_attributes($context, array $blocks = array())
    {
        // line 181
        echo "                            ";
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gallery"] ?? null), "photos", array(), "any", false, true), 0, array(), "array", false, true), "attachment", array(), "any", false, true), "isRemoteImage", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gallery"] ?? null), "photos", array()), 0, array(), "array"), "attachment", array()), "isRemoteImage", array()) == 1))) {
            // line 182
            echo "\t\t\t\t\t\t\t   src=\"";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gallery"] ?? null), "photos", array()), 0, array(), "array"), "attachment", array()), "thumbUrl", array()), "html", null, true);
            echo "\"
                            ";
        } else {
            // line 184
            echo "                                src=\"";
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('get_attachment')->getCallable(), array($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gallery"] ?? null), "photos", array()), 0, array(), "array"), "attachment", array()), "id", array()), ($context["width"] ?? null), ($context["height"] ?? null), ($context["crop"] ?? null), ($context["cropQuality"] ?? null))), "html", null, true);
            echo "\"
                            ";
        }
        // line 186
        echo "                            data-src=\"";
        echo Twig_SupTwg_escape_filter($this->env, ("holder.js/350x250?theme=simple&text=" . $this->getAttribute(($context["gallery"] ?? null), "title", array())), "html", null, true);
        echo "\" alt=\"";
        echo $this->getAttribute(($context["gallery"] ?? null), "title", array());
        echo "\"
\t\t\t\t\t\t\tstyle=\"
\t\t\t\t\t\t\t\tmax-width: 290px; max-height: 290px;
\t\t\t\t\t\t\t\t";
        // line 189
        if ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_width_unit", array()) == 0) &&  !Twig_SupTwg_test_empty($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_width", array())))) {
            // line 190
            echo "\t\t\t\t\t\t\t\t\twidth:";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_width", array()), "html", null, true);
            echo "px;
\t\t\t\t\t\t\t\t";
        } else {
            // line 192
            echo "\t\t\t\t\t\t\t\t\twidth: auto;
\t\t\t\t\t\t\t\t";
        }
        // line 194
        echo "\t\t\t\t\t\t\t\t";
        if ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_height_unit", array()) == 0) &&  !Twig_SupTwg_test_empty($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_height", array())))) {
            // line 195
            echo "\t\t\t\t\t\t\t\t\theight: ";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_height", array()), "html", null, true);
            echo "px;
\t\t\t\t\t\t\t\t";
        } else {
            // line 197
            echo "\t\t\t\t\t\t\t\t\theight: auto;
\t\t\t\t\t\t\t\t";
        }
        // line 199
        echo "\t\t\t\t\t\t\t\t\"
\t\t\t\t\t\t";
    }

    // line 214
    public function block_settginsFigCaption($context, array $blocks = array())
    {
        // line 215
        echo "\t\t\t\t\t\t";
        echo Twig_SupTwg_escape_filter($this->env, ($context["figcaptionBlockFree"] ?? null), "html", null, true);
        echo "
\t\t\t\t\t";
    }

    // line 312
    public function block_content($context, array $blocks = array())
    {
        // line 313
        echo "    ";
        $context["form"] = $this->loadTemplate("@core/form.twig", "@galleries/settings.twig", 313);
        // line 314
        echo "    ";
        $context["f"] = $this;
        // line 315
        echo "
\t<div class=\"gg-wraper-anchor-nav-links\" style=\"display: none;\">
\t\t<a href=\"#gg-anl-main\" class=\"gg-anchor-nav-links\">";
        // line 317
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Type")), "html", null, true);
        echo "</a>
\t\t<a href=\"#gg-mosaic-image-count-text-wrapper\" class=\"gg-anchor-nav-links ggSettingsDisplNone\" id=\"gg-anl-mosaic-settings-link\">";
        // line 318
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Image Count Settings")), "html", null, true);
        echo "</a>
\t\t<a href=\"#gg-anl-soc-share\" class=\"gg-anchor-nav-links\">";
        // line 319
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Social")), "html", null, true);
        echo "</a>
\t\t<a href=\"#gg-anl-load-more\" class=\"gg-anchor-nav-links\" id=\"gg-anl-load-more-link\">";
        // line 320
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Load More")), "html", null, true);
        echo "</a>
\t\t<a href=\"#gg-anl-cust-button\" class=\"gg-anchor-nav-links\">";
        // line 321
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Buttons")), "html", null, true);
        echo "</a>
        <a href=\"#gg-anl-horiz-scroll\" class=\"gg-anchor-nav-links\">";
        // line 322
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Scroll")), "html", null, true);
        echo "</a>
\t\t<a href=\"#gg-anl-border-type\" class=\"gg-anchor-nav-links\">";
        // line 323
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Border")), "html", null, true);
        echo "</a>
\t\t<a href=\"#gg-anl-shadow\" class=\"gg-anchor-nav-links\">";
        // line 324
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Shadow")), "html", null, true);
        echo "</a>
\t\t<a href=\"#gg-anl-popup\" class=\"gg-anchor-nav-links\">";
        // line 325
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Lightbox")), "html", null, true);
        echo "</a>
\t\t<a href=\"#gg-anl-lazyload\" class=\"gg-anchor-nav-links\">";
        // line 326
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("LazyLoad")), "html", null, true);
        echo "</a>
\t\t<a href=\"#gg-anl-preloader\" class=\"gg-anchor-nav-links\">";
        // line 327
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Loader")), "html", null, true);
        echo "</a>
\t\t<a href=\"#gg-anl-attributes\" class=\"gg-anchor-nav-links\">";
        // line 328
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Attributes")), "html", null, true);
        echo "</a>
\t\t<a href=\"#gg-anl-caption-add-sett\" class=\"gg-anchor-nav-links\">";
        // line 329
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Caption Transformations")), "html", null, true);
        echo "</a>
\t</div>
    <div class=\"settings-wrap\" data-leave-confirm=\"";
        // line 331
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Your changes not saved. You really want to leave without saving?")), "html", null, true);
        echo "\">
        ";
        // line 332
        echo $context["form"]->getopen("post", $this->getAttribute(($context["environment"] ?? null), "generateUrl", array(0 => "galleries", 1 => "saveSettings", 2 => array("gallery_id" => $this->getAttribute(($context["gallery"] ?? null), "id", array()), "_wpnonce" => ($context["_wpnonce"] ?? null))), "method"), array("id" => "form-settings", "class" => "form-gall-settings"));
        echo "
        <input id=\"currentPresetTitle\" name=\"title\" type=\"hidden\" value=\"";
        // line 333
        echo Twig_SupTwg_escape_filter($this->env, (($this->getAttribute(($context["settings"] ?? null), "title", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute(($context["settings"] ?? null), "title", array()), "")) : ("")), "html", null, true);
        echo "\"/>
        <input name=\"previewImage\" type=\"hidden\" value=\"";
        // line 334
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["gallery"] ?? null), "settings", array()), "previewImage", array()), "html", null, true);
        echo "\"/>
        <input name=\"sort[sortto]\" type=\"hidden\" value=\"";
        // line 335
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "sort", array()), "sortto", array()), "html", null, true);
        echo "\"/>
        <input name=\"sort[sortby]\" type=\"hidden\" value=\"";
        // line 336
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "sort", array()), "sortby", array()), "html", null, true);
        echo "\"/>
\t\t";
        // line 337
        echo $context["form"]->gethidden("plugins[membership][enable]", $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "plugins", array()), "membership", array()), "enable", array()), array("id" => "hiddenInpMembershipEnableVal"));
        echo "
\t\t";
        // line 338
        $this->displayBlock('proHiddenSettings', $context, $blocks);
        // line 339
        echo "
        <div data-tab=\"area\">
            ";
        // line 341
        $this->displayBlock('area', $context, $blocks);
        // line 519
        echo "
            ";
        // line 520
        $this->displayBlock('mosaicImagesCount', $context, $blocks);
        // line 522
        echo "
\t\t\t";
        // line 523
        $this->displayBlock('mosaicGalleryImageCountText', $context, $blocks);
        // line 525
        echo "
            ";
        // line 526
        $this->displayBlock('socialSharing', $context, $blocks);
        // line 697
        echo "
            <div class=\"load-more-button-preview\" id=\"gg-anl-load-more\">
                <h1 style=\"line-height: 1;\">
                    ";
        // line 700
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Load more gallery images with scroll or button")), "html", null, true);
        echo "
                    </br>
                    <a class=\"button get-pro\" href=\"";
        // line 702
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("utm_source=plugin&utm_medium=show-more&utm_campaign=gallery")), "html", null, true);
        echo "\" target=\"_blank\">";
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute(($context["environment"] ?? null), "translate", array(0 => "Get PRO"), "method"), "html", null, true);
        echo "</a>
                </h1>
                <div>
                    <a href=\"";
        // line 705
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("utm_source=plugin&utm_medium=show-more&utm_campaign=gallery")), "html", null, true);
        echo "\" target=\"_blank\">
                        <img src=\"";
        // line 706
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["environment"] ?? null), "module", array(0 => "galleries"), "method"), "getLocationUrl", array(), "method"), "html", null, true);
        echo "/assets/img/load_more_button_pro.jpg\" />
                    </a>
                </div>
                <div class=\"separator\"></div>
            </div>

            <div class=\"custom-buttons-preview\" id=\"gg-anl-cust-button\">
                <table class=\"form-table\">
                    <thead>
                        ";
        // line 715
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Custom Buttons")),         // line 716
$context["form"]->getbutton("buttons-presets-editor-preview", "Show preset Editor", array("class" => "button button-primary")), "custom-buttons-preview", true);
        echo "
                    </thead>
                </table>
                <div class=\"separator\"></div>
            </div>

\t\t\t";
        // line 722
        $this->displayBlock('horizontalScroll', $context, $blocks);
        // line 790
        echo "
            ";
        // line 791
        $this->displayBlock('border', $context, $blocks);
        // line 824
        echo "
            ";
        // line 825
        $this->displayBlock('shadow', $context, $blocks);
        // line 894
        echo "
            ";
        // line 895
        $this->displayBlock('popup', $context, $blocks);
        // line 1283
        echo "
\t\t\t";
        // line 1284
        $this->displayBlock('lazyload', $context, $blocks);
        // line 1335
        echo "
            ";
        // line 1336
        $this->displayBlock('preload', $context, $blocks);
        // line 1389
        echo "
            ";
        // line 1390
        $this->displayBlock('attributes', $context, $blocks);
        // line 1404
        echo "
\t\t\t";
        // line 1405
        $this->displayBlock('additionalCaptionSettings', $context, $blocks);
        // line 1435
        echo "\t\t\t";
        echo $context["form"]->gethidden("adminPage[slimScrollStartPos]", (($this->getAttribute($this->getAttribute(        // line 1437
($context["settings"] ?? null), "adminPage", array(), "any", false, true), "slimScrollStartPos", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "adminPage", array(), "any", false, true), "slimScrollStartPos", array()), 0)) : (0)), array("id" => "slimScrollStartPos"));
        // line 1439
        echo "
        </div>

        ";
        // line 1442
        $this->displayBlock('post', $context, $blocks);
        // line 1460
        echo "
\t\t<div data-tab=\"overlay\">
\t\t\t";
        // line 1463
        echo "\t\t\t";
        $context["effects"] = array("none" => "None", "center" => "Middle", "quarter-appear" => "Appear", "quarter-disappear" => "Disappear", "quarter-slide-up" => "Quarter Slide Up", "quarter-slide-side" => "Quarter Slide Side", "quarter-fall-in" => "Quarter Fall in", "quarter-two-step" => "Quarter Two-step", "quarter-zoom" => "Quarter Caption Zoom", "cover-fade" => "Cover Fade", "cover-push-right" => "Cover Push Right", "revolving-door-left" => "Revolving Door Left", "revolving-door-right" => "Revolving Door Right", "revolving-door-top" => "Revolving Door Top", "revolving-door-bottom" => "Revolving Door Bottom", "revolving-door-original-left" => "Revolving Door Original Left", "revolving-door-original-right" => "Revolving Door Original Right", "revolving-door-original-top" => "Revolving Door Original Top", "revolving-door-original-bottom" => "Revolving Door Original Bottom", "cover-slide-top" => "Cover Slide Top", "offset" => "Caption Offset", "guillotine-reverse" => "Guillotine Reverse", "half-slide" => "Half Slide", "sqkwoosh" => "Skwoosh", "tunnel" => "Tunnel", "direction-aware" => "Direction Aware", "phophorus-rotate" => "Phosphorus Rotate", "phophorus-offset" => "Phosphorus Offset", "phophorus-scale" => "Phosphorus Scale", "cube" => "Cube", "polaroid" => "Polaroid", "3d-cube" => "3D Cube", "show-on-hover" => "Show on Hover", "swing" => "Swing");
        // line 1499
        echo "\t\t\t";
        $context["iconsWithCaptionsEffects"] = array("icons" => "Default", "icons-scale" => "Scale", "icons-sodium-left" => "Sodium Left", "icons-sodium-top" => "Sodium Top", "icons-nitrogen-top" => "Nitrogen Top");
        // line 1506
        echo "\t\t\t";
        $context["enableCaptions"] = ((($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "enabled", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "enabled", array()), "true")) : ("true")) == "true");
        // line 1507
        echo "\t\t\t";
        $context["polaroidIsEnable"] = ((($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "effect", array()) == "polaroid")) ? ("true") : ("false"));
        // line 1508
        echo "
            ";
        // line 1509
        $this->displayBlock('captionSettingsType', $context, $blocks);
        // line 1539
        echo "\t\t\t";
        echo $context["form"]->gethidden("thumbnail[overlay][effect]", (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 1541
($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "effect", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "effect", array()), "quarter-appear")) : ("quarter-appear")), array("id" => "overlayEffect"));
        // line 1543
        echo "
\t\t\t";
        // line 1544
        echo         // line 1545
$context["form"]->gethidden("icons[effect]", $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "effect", array()), array("id" => "iconsEffectName"));
        // line 1546
        echo "

\t\t\t<div class=\"ggCaptionBuilderWrap\">
\t\t\t\t<div class=\"caption-type\" data-gg-cb-type=\"captions-icons\">
\t\t\t\t\t";
        // line 1550
        $this->displayBlock('overlaySettings', $context, $blocks);
        // line 1793
        echo "
\t\t\t\t\t";
        // line 1794
        $this->displayBlock('icons', $context, $blocks);
        // line 1933
        echo "\t\t\t\t</div>
\t\t\t\t<div class=\"caption-type\" data-gg-cb-type=\"caption-builder\">
\t\t\t\t\t";
        // line 1935
        $this->displayBlock('proCaptionAndIconSettings', $context, $blocks);
        // line 1937
        echo "\t\t\t\t</div>
\t\t\t\t<div class=\"exit-info\">
\t\t\t\t\t";
        // line 1939
        $this->displayBlock('exifCaptionSettings', $context, $blocks);
        // line 1956
        echo "\t\t\t\t</div>
\t\t\t</div>
        </div>

        ";
        // line 1960
        $this->displayBlock('categories', $context, $blocks);
        // line 1993
        echo "
        ";
        // line 1994
        $this->displayBlock('watermark', $context, $blocks);
        // line 2007
        echo "
        ";
        // line 2008
        $this->displayBlock('form', $context, $blocks);
        // line 2010
        echo "
        ";
        // line 2011
        echo $context["form"]->getclose();
        echo "

        <div id=\"saveDialog\" title=\"";
        // line 2013
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Save settings as preset")), "html", null, true);
        echo "\">
            <div>
                <label for=\"presetTitle\">
                    ";
        // line 2016
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Preset title:")), "html", null, true);
        echo "
                </label>
            </div>
            <div>
                <input id=\"presetTitle\" type=\"text\" name=\"title\" style=\"width:100%;\" value=\"";
        // line 2020
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute(($context["preset"] ?? null), "title", array()), "html", null, true);
        echo "\"/>
                <input id=\"settingsId\" type=\"hidden\" name=\"settings_id\" value=\"";
        // line 2021
        echo Twig_SupTwg_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "\"/>
            </div>
        </div>

        <div id=\"deletePreset\" title=\"";
        // line 2025
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Delete preset")), "html", null, true);
        echo "\">
            <p>
                ";
        // line 2027
        echo Twig_SupTwg_escape_filter($this->env, sprintf(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Are you really want to delete preset \"%s\"?")), $this->getAttribute(($context["preset"] ?? null), "title", array())), "html", null, true);
        echo "
            </p>
            <input type=\"hidden\" id=\"presetId\" value=\"";
        // line 2029
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute(($context["preset"] ?? null), "id", array()), "html", null, true);
        echo "\">
        </div>

        <div id=\"loadPreset\" title=\"";
        // line 2032
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Load settings from presets")), "html", null, true);
        echo "\">
            <div>
                <label for=\"presetList\">";
        // line 2034
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select preset:")), "html", null, true);
        echo "</label>
            </div>
            <div>
                <select id=\"presetList\" name=\"presetList\" style=\"width:100%\"></select>
            </div>
            <div id=\"presetListError\">
                <p id=\"presetLoadingFailed\" style=\"display:none\">
                    ";
        // line 2041
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Failed to load the presets.")), "html", null, true);
        echo "
                </p>

                <p id=\"presetEmpty\" style=\"display:none\">
                    ";
        // line 2045
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Currently you have no presets.")), "html", null, true);
        echo "
                </p>
            </div>
        </div>

        <div id=\"themeDialog\" title=\"";
        // line 2050
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select \"Big image\" theme")), "html", null, true);
        echo "\">
            <h1>
                ";
        // line 2052
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select a theme")), "html", null, true);
        echo "
            </h1>
\t\t\t<div class=\"popupPlacementTypeWrapper\">
\t\t\t\t";
        // line 2055
        $context["popupPlacementType"] = ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "popup", array()), "placementType", array()) == null)) ? (0) : ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "popup", array()), "placementType", array())));
        // line 2056
        echo "\t\t\t\t<h4>";
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("How to fit image in lightbox")), "html", null, true);
        echo "</h4>
\t\t\t\t";
        // line 2057
        echo ((((((((        // line 2058
$context["form"]->getradio("popup[placementType]", "0", Twig_SupTwg_array_merge(array("id" => "popupPlacementTypeFts", "class" => "popupPlacementTypeRadio"), (((        // line 2061
($context["popupPlacementType"] ?? null) == 0)) ? (array("checked" => "checked")) : (array())))) .         // line 2063
$context["form"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Fit To Screen")), "popupPlacementTypeFts")) . "<br/>") .         // line 2067
$context["form"]->getradio("popup[placementType]", "1", Twig_SupTwg_array_merge(array("id" => "popupPlacementTypeFw", "class" => "popupPlacementTypeRadio"), (((        // line 2070
($context["popupPlacementType"] ?? null) == 1)) ? (array("checked" => "checked")) : (array()))))) .         // line 2072
$context["form"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Fit Width")), "popupPlacementTypeFw")) . "<br/>") .         // line 2076
$context["form"]->getradio("popup[placementType]", "2", Twig_SupTwg_array_merge(array("id" => "popupPlacementTypeSo", "class" => "popupPlacementTypeRadio"), (((        // line 2079
($context["popupPlacementType"] ?? null) == 2)) ? (array("checked" => "checked")) : (array()))))) .         // line 2081
$context["form"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Show Original")), "popupPlacementTypeSo")) . "<br/>");
        // line 2086
        echo "
\t\t\t</div>
            <div>
                ";
        // line 2089
        $context["bigImageThemes"] = array("theme_1" => "Theme 1", "theme_2" => "Theme 2", "theme_3" => "Theme 3", "theme_4" => "Theme 4", "theme_5" => "Theme 5", "theme_6" => "Theme 6", "theme_7" => "Theme 7");
        // line 2098
        echo "
                ";
        // line 2099
        if ($this->getAttribute(($context["environment"] ?? null), "isPro", array(), "method")) {
            // line 2100
            echo "                    ";
            $context["bigImageThemes"] = Twig_SupTwg_array_merge(($context["bigImageThemes"] ?? null), array("theme_1_pro" => "Fullscreen popup"));
            // line 2101
            echo "                ";
        }
        // line 2102
        echo "
                ";
        // line 2103
        $context['_parent'] = $context;
        $context['_seq'] = Twig_SupTwg_ensure_traversable(($context["bigImageThemes"] ?? null));
        foreach ($context['_seq'] as $context["value"] => $context["name"]) {
            // line 2104
            echo "                    <div class=\"grid-gallery-caption ";
            if (($context["value"] == $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array()), "theme", array()))) {
                echo "gg-active";
            }
            echo "\">
                        <img data-name=\"";
            // line 2105
            echo Twig_SupTwg_escape_filter($this->env, $context["name"], "html", null, true);
            echo "\" data-val=\"";
            echo Twig_SupTwg_escape_filter($this->env, $context["value"], "html", null, true);
            echo "\" class=\"theme dialog-image\"
                             src=\"";
            // line 2106
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["environment"] ?? null), "getModule", array(0 => "colorbox"), "method"), "getThemeScreenshotUrl", array(0 => $context["value"]), "method"), "html", null, true);
            echo "\" alt=\"";
            echo Twig_SupTwg_escape_filter($this->env, $context["name"], "html", null, true);
            echo "\"
                             title=\"";
            // line 2107
            echo Twig_SupTwg_escape_filter($this->env, $context["name"], "html", null, true);
            echo "\"/>
                        <div class=\"select-element\">
                            <h3>";
            // line 2109
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select")), "html", null, true);
            echo "</h3>
                        </div>
\t\t\t\t\t\t<div class=\"gg-selected-theme\">
\t\t\t\t\t\t\t<div class=\"gg-selected-theme-txt\">";
            // line 2112
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array(("Selected " . $context["name"]))), "html", null, true);
            echo "</div>
\t\t\t\t\t\t</div>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['value'], $context['name'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 2116
        echo "
            </div>
        </div>

        <div id=\"effectDialog\" title=\"";
        // line 2120
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select overlay effect")), "html", null, true);
        echo "\">
            <div id=\"effectsPreview\" style=\"margin-top: 10px;\">
                ";
        // line 2122
        $context['_parent'] = $context;
        $context['_seq'] = Twig_SupTwg_ensure_traversable(($context["effects"] ?? null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["type"] => $context["name"]) {
            // line 2123
            echo "                    ";
            if (($context["type"] == "direction-aware")) {
                // line 2124
                echo "                        <figure class=\"grid-gallery-caption\" data-grid-gallery-type=\"";
                echo Twig_SupTwg_escape_filter($this->env, $context["type"], "html", null, true);
                echo "\">
                            <div class=\"box\">
                                <div class=\"box__right\">Right → Left</div>
                                <div class=\"box__left\">Left → Right</div>
                                <div class=\"box__top\">Top → Bottom</div>
                                <div class=\"box__bottom\">Bottom → Top</div>
                                <div class=\"box__center\">
                                </div>
                                <img data-src=\"holder.js/150x150?theme=industrial&text=";
                // line 2132
                echo Twig_SupTwg_escape_filter($this->env, $context["name"], "html", null, true);
                echo "\" class=\"dialog-image\">
                            </div>
                            <div class=\"select-element\">
                                ";
                // line 2135
                echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select")), "html", null, true);
                echo "
                            </div>
                        </figure>
\t\t\t\t\t";
            } elseif (Twig_SupTwg_in_filter(            // line 2138
$context["type"], array(0 => "show-on-hover", 1 => "fade-in", 2 => "grow", 3 => "shrink", 4 => "rotate-z", 5 => "square-to-circle"))) {
                // line 2139
                echo "\t\t\t\t\t\t";
                $this->displayBlock('captionEffectInPro', $context, $blocks);
                // line 2156
                echo "                    ";
            } elseif (($context["type"] == "3d-cube")) {
                // line 2157
                echo "                        <figure class=\"grid-gallery-caption\" data-grid-gallery-type=\"";
                echo Twig_SupTwg_escape_filter($this->env, $context["type"], "html", null, true);
                echo "\">
                            <div class=\"box-3d-cube-scene\" style=\"perspective: 300px;-webkit-perspective: 300px\">
                                <div class=\"box-3d-cube\"
                                     style=\"
                                         transform-origin:50% 50% -75px;
                                         -ms-transform-origin: 50% 50% -75px;
                                         -webkit-transform-origin: 50% 50% -75px;
                                         width:150px; height:150px
                                     \"
                                >
                                    <div class=\"face front\" style=\"width:150px; height:150px\">
                                        <img data-src=\"holder.js/150x150?theme=industrial&text=";
                // line 2168
                echo Twig_SupTwg_escape_filter($this->env, $context["name"], "html", null, true);
                echo "\" class=\"dialog-image\">
                                    </div>
                                    <div style=\"";
                // line 2170
                echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter(($context["figcaptionStyle"] ?? null)), "html", null, true);
                echo "width:150px; height:150px\" class=\"face back\">
                                        <div class=\"grid-gallery-figcaption-wrap\">
                                            <span ";
                // line 2172
                if (($this->getAttribute(($context["settings"] ?? null), "rtl", array()) == true)) {
                    echo "dir=\"rtl\" class=\"ggRtlClass\"";
                }
                echo ">";
                echo Twig_SupTwg_escape_filter($this->env, $context["name"], "html", null, true);
                echo "</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=\"select-element\">
                                ";
                // line 2178
                echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select")), "html", null, true);
                echo "
                            </div>
                        </figure>
                    ";
            } else {
                // line 2182
                echo "                        <figure class=\"grid-gallery-caption\" data-grid-gallery-type=\"";
                echo Twig_SupTwg_escape_filter($this->env, $context["type"], "html", null, true);
                echo "\">
                            <img data-src=\"holder.js/150x150?theme=industrial&text=";
                // line 2183
                echo Twig_SupTwg_escape_filter($this->env, $context["name"], "html", null, true);
                echo "\" class=\"dialog-image\">
                            <figcaption style=\"";
                // line 2184
                echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter(($context["figcaptionStyle"] ?? null)), "html", null, true);
                echo "\">
                                <div class=\"grid-gallery-figcaption-wrap\" style=\"width:100%;height:100%;top:0;\">
                                    <div style=\"display:table;width:100%;height:100%;\">
                                        <span ";
                // line 2187
                if (($this->getAttribute(($context["settings"] ?? null), "rtl", array()) == true)) {
                    echo "dir=\"rtl\" class=\"ggRtlClass\"";
                }
                echo " style=\"display:table-cell;font-size:";
                echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size", array()), "html", null, true);
                echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size_unit", array()), array(0 => "px", 1 => "%", 2 => "em")), "html", null, true);
                echo ";padding:10px;vertical-align:";
                echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "position", array()), "html", null, true);
                echo ";\">Caption</span>
                                    </div>
                                </div>
                            </figcaption>
                            <div class=\"select-element\">
                                ";
                // line 2192
                echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select")), "html", null, true);
                echo "
                            </div>
                        </figure>
                    ";
            }
            // line 2196
            echo "                ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['name'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 2197
        echo "                <div class=\"grid-gallery-clearfix\" style=\"clear: both;\"></div>
\t\t\t\t";
        // line 2198
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "captionBuilder", array()), "enabled", array()) != "1")) {
            // line 2199
            echo "\t\t\t\t\t<div class=\"captions-effect-with-icons\" data-confirm=\"";
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("This effect requires icons be enabled. Enable Icons?")), "html", null, true);
            echo "\">
\t\t\t\t\t\t<h3>Captions effects with icons</h3>
\t\t\t\t\t\t";
            // line 2201
            $this->displayBlock('iconsEffects', $context, $blocks);
            // line 2225
            echo "\t\t\t\t\t</div>
\t\t\t\t";
        }
        // line 2227
        echo "            </div>
        </div>

        <div id=\"shadowDialog\" title=\"";
        // line 2230
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select shadow preset")), "html", null, true);
        echo "\">
            <h1>
                ";
        // line 2232
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select shadow")), "html", null, true);
        echo "
            </h1>
            <div class=\"shadow-dialog-wrapper\">
                ";
        // line 2235
        $context["shadowPresets"] = array("effect_1" => array("name" => "Effect 1", "offset_x" => "8", "offset_y" => "8", "blur" => "6", "color" => "rgba(0, 0, 0, 0.58)"), "effect_2" => array("name" => "Effect 2", "offset_x" => "-8", "offset_y" => "-8", "blur" => "6", "color" => "rgba(0, 0, 0, 0.58)"), "effect_3" => array("name" => "Effect 3", "offset_x" => "-8", "offset_y" => "8", "blur" => "6", "color" => "rgba(0, 0, 0, 0.58)"), "effect_4" => array("name" => "Effect 4", "offset_x" => "8", "offset_y" => "-8", "blur" => "6", "color" => "rgba(0, 0, 0, 0.58)"), "effect_5" => array("name" => "Effect 5", "offset_x" => "8", "offset_y" => "0", "blur" => "6", "color" => "rgba(0, 0, 0, 0.58)"), "effect_6" => array("name" => "Effect 6", "offset_x" => "-8", "offset_y" => "0", "blur" => "6", "color" => "rgba(0, 0, 0, 0.58)"), "effect_7" => array("name" => "Effect 7", "offset_x" => "0", "offset_y" => "-8", "blur" => "6", "color" => "rgba(0, 0, 0, 0.58)"), "effect_8" => array("name" => "Effect 8", "offset_x" => "0", "offset_y" => "8", "blur" => "6", "color" => "rgba(0, 0, 0, 0.58)"), "effect_9" => array("name" => "Effect 9", "offset_x" => "0", "offset_y" => "4", "blur" => "10", "color" => "rgba(0, 0, 0, 1.0)"), "effect_10" => array("name" => "Effect 10", "offset_x" => "0", "offset_y" => "-4", "blur" => "8", "color" => "rgba(0, 0, 0, 1.0)"));
        // line 2307
        echo "

                ";
        // line 2309
        $context['_parent'] = $context;
        $context['_seq'] = Twig_SupTwg_ensure_traversable(($context["shadowPresets"] ?? null));
        foreach ($context['_seq'] as $context["value"] => $context["effect"]) {
            // line 2310
            echo "                    <div class=\"grid-gallery-caption\" style=\"float: left; margin-left: 15px; cursor: pointer;\">
                        <div class=\"shadow-preset\" data-offset-x=\"";
            // line 2311
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($context["effect"], "offset_x", array()), "html", null, true);
            echo "\" data-offset-y=\"";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($context["effect"], "offset_y", array()), "html", null, true);
            echo "\" data-blur=\"";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($context["effect"], "blur", array()), "html", null, true);
            echo "\" data-color=\"";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($context["effect"], "color", array()), "html", null, true);
            echo "\"
                             style=\"margin: 20px; box-shadow: ";
            // line 2312
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($context["effect"], "offset_x", array()), "html", null, true);
            echo "px ";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($context["effect"], "offset_y", array()), "html", null, true);
            echo "px ";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($context["effect"], "blur", array()), "html", null, true);
            echo "px ";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($context["effect"], "color", array()), "html", null, true);
            echo ";\">
                            <img data-src=\"holder.js/150x150?theme=industrial&text=";
            // line 2313
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($context["effect"], "name", array()), "html", null, true);
            echo "\" class=\"dialog-image\"/>
                        </div>
                        <div class=\"select-element\">
                            ";
            // line 2316
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select")), "html", null, true);
            echo "
                        </div>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['value'], $context['effect'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 2320
        echo "
            </div>
        </div>

        <div id=\"reviewNotice\" title=\"Review\" hidden>
            <h3>Hey, I noticed you just use Gallery by Supsystic over a week – that’s awesome!</h3>
            <p>Could you please do me a BIG favor and give it a 5-star rating on WordPress? Just to help us spread the word and boost our motivation.</p>

            <ul style=\"list-style: circle; padding-left: 30px;\">
                <li>
                    <button class=\"button button-primary\"><a href=\"//wordpress.org/support/view/plugin-reviews/gallery-by-supsystic?rate=5#postform\" target=\"_blank\" class=\"bupSendStatistic\" data-statistic-code=\"is_shown\" style=\"color:#000000 !important;\">Ok, you deserve it</a></button>
                </li>
                <li>
                    <button class=\"button button-primary\"><span class=\"toeLikeLink bupSendStatistic\" data-statistic-code=\"is_shown\">Nope, maybe later</span></button>
                </li>
                <li>
                    <button class=\"button button-primary\"><span class=\"toeLikeLink bupSendStatistic\" data-statistic-code=\"is_shown\">I already did</span></button>
                </li>
            </ul>
        </div>

        <div id=\"settingsImportDialog\" title=\"Import\" hidden>
            <div class=\"import\" style=\"display:none\">
                <p>";
        // line 2343
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Import settings from gallery")), "html", null, true);
        echo "</p>
                <select class=\"list\"></select>
            </div>
            <div class=\"import-not-available\" style=\"display:none\">
                <p>";
        // line 2347
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Here you can import settings from other galleries, but right now, you have only one gallery, create more - and see how it works")), "html", null, true);
        echo "</p>
            </div>
            <div class=\"import-gallery-loading\">
                <p>";
        // line 2350
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Loading gallery list...")), "html", null, true);
        echo "</p>
            </div>
        </div>

\t\t<div id=\"videoUrlAddDialog\" title=\"";
        // line 2354
        echo "Add video url";
        echo "\" style=\"display:none;\" data-gallery-id=\"";
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute(($context["gallery"] ?? null), "id", array()), "html", null, true);
        echo "\">
\t\t\t<div class=\"sggVideoUrlAddWr\">
\t\t\t\t<div class=\"sggTableRow\">
\t\t\t\t\t<div class=\"sggTableColumn6\">
\t\t\t\t\t\t<div class=\"sggDlgVideoTypeH3\">";
        // line 2358
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Video type:")), "html", null, true);
        echo "</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"sggTableColumn6\">
\t\t\t\t\t\t";
        // line 2361
        echo ((((        // line 2362
$context["form"]->getradio("sggDlgVideoType", "youtube", array("id" => "sggDlgYoutubeVideoType", "class" => "sggDlgVideoTypeRadio", "checked" => "checked")) .         // line 2367
$context["form"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Youtube url")), "sggDlgYoutubeVideoType")) . "<br/>") .         // line 2371
$context["form"]->getradio("sggDlgVideoType", "vimeo", array("id" => "sggDlgVimeoVideoType", "class" => "sggDlgVideoTypeRadio"))) .         // line 2376
$context["form"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Vimeo url")), "sggDlgVimeoVideoType"));
        // line 2380
        echo "
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"sggTableRow\">
\t\t\t\t\t<div class=\"sggTableColumn6\">
\t\t\t\t\t\t<div class=\"sggDlgVideoTypeH3\">";
        // line 2385
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Video url:")), "html", null, true);
        echo "</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"sggTableColumn6\">
\t\t\t\t\t\t";
        // line 2388
        echo         // line 2389
$context["form"]->getinput("text", "sggDlgUrlVideoValue", "", array("id" => "sggDlgUrlVideoInp", "class" => ""));
        // line 2395
        echo "
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"sggTableRow sggAduHiden\" id=\"sggAduErrorText\"></div>
\t\t\t</div>
\t\t</div>

        ";
        // line 2402
        $context["importTypes"] = $this->loadTemplate("@galleries/shortcode/import.twig", "@galleries/settings.twig", 2402);
        // line 2403
        echo "        <div id=\"importDialog\" title=\"";
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select source to import from")), "html", null, true);
        echo "\" style=\"display: none;\">
            ";
        // line 2404
        echo $context["importTypes"]->getshow(400, $this->getAttribute(($context["gallery"] ?? null), "id", array()));
        echo "
        </div>

        <div class=\"buttons-edit-preset-dialog-preview\" title=\"";
        // line 2407
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Buttons preset editor for Paginations, Categories and Load More buttons")), "html", null, true);
        echo "\">
            <a href=\"";
        // line 2408
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("utm_source=plugin&utm_medium=show-more&utm_campaign=gallery")), "html", null, true);
        echo "\" target=\"_blank\">
                <img src=\"";
        // line 2409
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["environment"] ?? null), "module", array(0 => "galleries"), "method"), "getLocationUrl", array(), "method"), "html", null, true);
        echo "/assets/img/custom_button_icon_pro.jpg\" />
            </a>
        </div>

        <div class=\"loader-dialog-preview\" title=\"";
        // line 2413
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Improve free version")), "html", null, true);
        echo "\" style=\"line-height: 200%;\">
            Please be advised that this option is available only in <u>Pro version</u>. You can
            <a  href=\"";
        // line 2415
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("utm_source=plugin&utm_medium=loader&utm_campaign=gallery")), "html", null, true);
        echo "\" target=\"_blank\" class=\"button\">
                Get PRO
            </a>
            today and get this and other PRO options for Galleries!
        </div>
    </div>

    ";
        // line 2422
        $this->displayBlock('modals', $context, $blocks);
        // line 2478
        echo "
\t";
        // line 2479
        $this->displayBlock('settingsOtherPro', $context, $blocks);
    }

    // line 338
    public function block_proHiddenSettings($context, array $blocks = array())
    {
    }

    // line 341
    public function block_area($context, array $blocks = array())
    {
        // line 342
        echo "                <table class=\"form-table\" name=\"area\" id=\"gg-anl-main\">
                    <thead>
\t\t\t\t\t\t";
        // line 344
        $this->displayBlock('galleryTypeSelectorItems', $context, $blocks);
        // line 363
        echo "
                        <tr id=\"generalColumnsRow\" hidden>
                            <th scope=\"row\">
                                <label style=\"margin: 0 !important;\">
                                    ";
        // line 367
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Number of Columns")), "html", null, true);
        echo "
        \t\t\t\t\t\t\t";
        // line 368
        echo $context["form"]->getshow_tooltip("columns");
        echo "
        \t\t\t\t\t\t\t<br />
        \t\t\t\t\t\t\t<label><a href=\"http://supsystic.com/fixed-columns-gallery-example/\" style=\"color: #0074a2; font-size: 10px; text-decoration: none;\">More Info</a> </label>
                                </label>
                            </th>
                            <td>
                                <input type=\"number\" name=\"general[columns][number]\" value=\"";
        // line 374
        echo Twig_SupTwg_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "general", array(), "any", false, true), "columns", array(), "any", false, true), "number", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "general", array(), "any", false, true), "columns", array(), "any", false, true), "number", array()), 3)) : (3)), "html", null, true);
        echo "\">
                            </td>
                        </tr>

                        ";
        // line 378
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Responsive columns")), (((((((((((((        // line 379
$context["form"]->getinput("number", "general[responsiveColumns][desktop][width]", (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "general", array(), "any", false, true), "responsiveColumns", array(), "any", false, true), "desktop", array(), "any", false, true), "width", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "general", array(), "any", false, true), "responsiveColumns", array(), "any", false, true), "desktop", array(), "any", false, true), "width", array()), 1200)) : (1200)), array("style" => array("width" => "60px;"))) . $context["form"]->getspan("", "px")) .         // line 380
$context["form"]->getinput("number", "general[responsiveColumns][desktop][columns]", (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "general", array(), "any", false, true), "responsiveColumns", array(), "any", false, true), "desktop", array(), "any", false, true), "columns", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "general", array(), "any", false, true), "responsiveColumns", array(), "any", false, true), "desktop", array(), "any", false, true), "columns", array()), (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "general", array(), "any", false, true), "columns", array(), "any", false, true), "number", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "general", array(), "any", false, true), "columns", array(), "any", false, true), "number", array()), 3)) : (3)))) : ((($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "general", array(), "any", false, true), "columns", array(), "any", false, true), "number", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "general", array(), "any", false, true), "columns", array(), "any", false, true), "number", array()), 3)) : (3)))), array("style" => array("width" => "40px;")))) . $context["form"]->getspan("", "columns")) . "<br>") .         // line 382
$context["form"]->getinput("number", "general[responsiveColumns][tablet][width]", (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "general", array(), "any", false, true), "responsiveColumns", array(), "any", false, true), "tablet", array(), "any", false, true), "width", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "general", array(), "any", false, true), "responsiveColumns", array(), "any", false, true), "tablet", array(), "any", false, true), "width", array()), 768)) : (768)), array("style" => array("width" => "60px;")))) . $context["form"]->getspan("", "px")) .         // line 383
$context["form"]->getinput("number", "general[responsiveColumns][tablet][columns]", (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "general", array(), "any", false, true), "responsiveColumns", array(), "any", false, true), "tablet", array(), "any", false, true), "columns", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "general", array(), "any", false, true), "responsiveColumns", array(), "any", false, true), "tablet", array(), "any", false, true), "columns", array()), (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "general", array(), "any", false, true), "columns", array(), "any", false, true), "number", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "general", array(), "any", false, true), "columns", array(), "any", false, true), "number", array()), 3)) : (3)))) : ((($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "general", array(), "any", false, true), "columns", array(), "any", false, true), "number", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "general", array(), "any", false, true), "columns", array(), "any", false, true), "number", array()), 3)) : (3)))), array("style" => array("width" => "40px;")))) . $context["form"]->getspan("", "columns")) . "<br>") .         // line 385
$context["form"]->getinput("number", "general[responsiveColumns][mobile][width]", (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(        // line 386
($context["settings"] ?? null), "general", array(), "any", false, true), "responsiveColumns", array(), "any", false, true), "mobile", array(), "any", false, true), "width", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "general", array(), "any", false, true), "responsiveColumns", array(), "any", false, true), "mobile", array(), "any", false, true), "width", array()), 320)) : (320)), array("style" => array("width" => "60px;")))) . $context["form"]->getspan("", "px")) .         // line 387
$context["form"]->getinput("number", "general[responsiveColumns][mobile][columns]", (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "general", array(), "any", false, true), "responsiveColumns", array(), "any", false, true), "mobile", array(), "any", false, true), "columns", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "general", array(), "any", false, true), "responsiveColumns", array(), "any", false, true), "mobile", array(), "any", false, true), "columns", array()), (($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "general", array(), "any", false, true), "columns", array(), "any", false, true), "number", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "general", array(), "any", false, true), "columns", array(), "any", false, true), "number", array()), 3)) : (3)))) : ((($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "general", array(), "any", false, true), "columns", array(), "any", false, true), "number", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "general", array(), "any", false, true), "columns", array(), "any", false, true), "number", array()), 3)) : (3)))), array("style" => array("width" => "40px;")))) . $context["form"]->getspan("", "columns")), "responsive-columns");
        echo "

                        ";
        // line 391
        echo "
    \t\t\t\t\t";
        // line 392
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Gallery Name:")),         // line 393
$context["form"]->getinput("text", "title", $this->getAttribute(($context["gallery"] ?? null), "title", array()), array("style" => array("width" => "232px;"))), "title");
        // line 394
        echo "

\t\t\t\t\t\t";
        // line 396
        echo $context["form"]->getrow($this->getAttribute(($context["environment"] ?? null), "translate", array(0 => "Gallery alignment"), "method"),         // line 397
$context["form"]->getselect("area[position]", array(0 => "Left", 1 => "Center", 2 => "Right"), (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array(), "any", false, true), "position", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array(), "any", false, true), "position", array()), 1)) : (1)), array("style" => "width: 100px;")), "gallery-align");
        echo "


\t\t\t\t\t\t";
        // line 400
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Distance between images")), (        // line 401
$context["form"]->getinput("number", "area[distance]", $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "distance", array()), array("style" => array("width" => "140px;"))) .         // line 402
$context["form"]->getspan("", "pixels")), "distance");
        echo "

                        ";
        // line 404
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Gallery width")), (        // line 405
$context["form"]->getinput("number", "area[width]", $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "width", array()), array("style" => array("width" => "140px"))) .         // line 406
$context["form"]->getselect("area[width_unit]", array(0 => "pixels", 1 => "percents"), $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "width_unit", array()), array("style" => "margin-top: -2px; height: 27px;"))), "area-width");
        echo "

                        ";
        // line 409
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Full screen width")),         // line 410
$context["form"]->getcheckbox("fullscreen", "1", (($this->getAttribute(        // line 413
($context["settings"] ?? null), "fullscreen", array())) ? (array("checked" => "checked")) : (array()))), "full-screen-width");
        // line 416
        echo "

                        ";
        // line 418
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Gallery padding")), (        // line 419
$context["form"]->getinput("number", "area[padding]", (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array(), "any", false, true), "padding", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array(), "any", false, true), "padding", array()), 0)) : (0)), array("style" => array("width" => "140px"))) . $context["form"]->getspan("", "pixels")), "area-padding");
        echo "

                        ";
        // line 426
        echo "
                        ";
        // line 427
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Image width")), (        // line 428
$context["form"]->getinput("number", "area[photo_width]", $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_width", array()), array("style" => array("width" => "140px"))) .         // line 429
$context["form"]->getselect("area[photo_width_unit]", array(0 => "pixels", 1 => "percents"), $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_width_unit", array()), array("style" => "margin-top: -2px; height: 27px; width: 85px;"))), "photo-width");
        echo "


                        ";
        // line 432
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Image height")), (        // line 433
$context["form"]->getinput("number", "area[photo_height]", $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_height", array()), array("style" => array("width" => "140px"))) .         // line 434
$context["form"]->getselect("area[photo_height_unit]", array(0 => "pixels"), $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "area", array()), "photo_height_unit", array()), array("style" => "margin-top: -2px; height: 27px; width: 85px;"))), "photo-height");
        echo "

                        ";
        // line 436
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Image radius")), (        // line 437
$context["form"]->getinput("number", "thumbnail[border][radius]", $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "border", array()), "radius", array()), array("style" => array("width" => "140px"))) .         // line 438
$context["form"]->getselect("thumbnail[border][radius_unit]", array(0 => "pixels", 1 => "percents"), $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "border", array()), "radius_unit", array()), array("style" => "margin-top: -2px; height: 27px; width: 85px;"))), "border-radius");
        echo "

                        ";
        // line 441
        echo "                        ";
        $context["qualityList"] = array("100" => "100%", "90" => "90%", "80" => "80%", "70" => "70%", "60" => "60%", "50" => "50%", "40" => "40%", "30" => "30%", "20" => "20%", "10" => "10%");
        // line 453
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Image crop quality")),         // line 454
$context["form"]->getselect("thumbnail[cropQuality]",         // line 456
($context["qualityList"] ?? null), (($this->getAttribute($this->getAttribute(        // line 457
($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "cropQuality", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "cropQuality", array()), "100")) : ("100"))), "cropQuality");
        // line 460
        echo "

                        ";
        // line 462
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Display only first image")),         // line 463
$context["form"]->getcheckbox("displayFirstPhoto", "on", ((($this->getAttribute(        // line 466
($context["settings"] ?? null), "displayFirstPhoto", array()) == "on")) ? (array("checked" => "checked")) : (array()))), "display-first-photo", null, "display-first-photo-row");
        // line 471
        echo "

                        ";
        // line 473
        $this->displayBlock('openByLink', $context, $blocks);
        // line 481
        echo "
\t\t\t\t\t\t";
        // line 482
        $this->displayBlock('browserUrlTooltipHide', $context, $blocks);
        // line 491
        echo "
\t\t\t\t\t\t";
        // line 492
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable image title")),         // line 493
$context["form"]->getcheckbox("disableImageTitle", 1, ((($this->getAttribute(        // line 496
($context["settings"] ?? null), "disableImageTitle", array()) == 1)) ? (array("checked" => "checked")) : (array()))), null, null, null);
        // line 499
        echo "

                        ";
        // line 501
        $this->displayBlock('disableRightClick', $context, $blocks);
        // line 503
        echo "
\t\t\t\t\t\t";
        // line 504
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Use these settings by default")),         // line 505
$context["form"]->getcheckbox("defaultsettings", "1", (($this->getAttribute(        // line 508
($context["settings"] ?? null), "defaultsettings", array())) ? (array("checked" => "checked")) : (array()))), "default-settings");
        // line 511
        echo "



                    </thead>
                </table>
                <div class=\"separator\"></div>
            ";
    }

    // line 344
    public function block_galleryTypeSelectorItems($context, array $blocks = array())
    {
        // line 345
        echo "\t\t\t\t\t\t\t";
        $context["galleryTypeObj"] = array(0 => array("value" => "0", "title" => "Fixed"), 1 => array("value" => "1", "title" => "Vertical"), 2 => array("value" => "2", "title" => "Horizontal"), 3 => array("value" => "3", "title" => "Fixed Columns"), 4 => array("value" => "4", "title" => (("Mosaic(" . call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Available in Pro"))) . ")"), "disabled" => 1));
        // line 352
        echo "
\t\t\t\t\t\t\t";
        // line 353
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Gallery Type")),         // line 354
$context["form"]->getselectWithElem("area[grid]",         // line 356
($context["galleryTypeObj"] ?? null), $this->getAttribute($this->getAttribute(        // line 357
($context["settings"] ?? null), "area", array()), "grid", array()), array("style" => "width: auto;")), "grid-type", "gallery-types", "columns");
        // line 361
        echo "
\t\t\t\t\t\t";
    }

    // line 473
    public function block_openByLink($context, array $blocks = array())
    {
        // line 474
        echo "                            ";
        echo $context["form"]->getrowpro(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Open by link in popup")), "utm_source=plugin&utm_medium=open-by-link&utm_campaign=gallery", "open-by-link",         // line 477
$context["form"]->getcheckbox("openByLink", "on", array("disabled" => "disabled")));
        // line 479
        echo "
                        ";
    }

    // line 482
    public function block_browserUrlTooltipHide($context, array $blocks = array())
    {
        // line 483
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrowpro(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Hide browser url tooltip on image hover")), "utm_source=plugin&utm_medium=browser-url-tooltip-hide&utm_campaign=gallery", "browserUrlTooltipHideFree",         // line 486
$context["form"]->getcheckbox("browserUrlTooltipHideFree", "on", array("disabled" => "disabled")));
        // line 488
        echo "

\t\t\t\t\t\t";
    }

    // line 501
    public function block_disableRightClick($context, array $blocks = array())
    {
        // line 502
        echo "                        ";
    }

    // line 520
    public function block_mosaicImagesCount($context, array $blocks = array())
    {
        // line 521
        echo "            ";
    }

    // line 523
    public function block_mosaicGalleryImageCountText($context, array $blocks = array())
    {
        // line 524
        echo "\t\t\t";
    }

    // line 526
    public function block_socialSharing($context, array $blocks = array())
    {
        // line 527
        echo "                <table class=\"form-table\" id=\"gg-anl-soc-share\">
                    <thead>
                    ";
        // line 529
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Social Sharing")), (((        // line 530
$context["form"]->getradio("socialSharing[enabled]", true, Twig_SupTwg_array_merge(array("id" => "social-sharing-enable"), (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "socialSharing", array()), "enabled", array())) ? (array("checked" => "checked")) : (array())))) .         // line 531
$context["f"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "social-sharing-enable")) .         // line 532
$context["form"]->getradio("socialSharing[enabled]", false, Twig_SupTwg_array_merge(array("id" => "social-sharing-disable"), (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "socialSharing", array()), "enabled", array())) ? (array()) : (array("checked" => "checked")))))) .         // line 533
$context["f"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable")), "social-sharing-disable")), "social-sharing", true);
        echo "
                    </thead>
                    <tbody style=\"display: none;\">
                    ";
        // line 536
        if ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "socialSharing", array()), "pluginInstalled", array())) {
            // line 537
            echo "                        ";
            if (Twig_SupTwg_length_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "socialSharing", array()), "projectsList", array()))) {
                // line 538
                echo "

                            ";
                // line 540
                echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Social Buttons Project")),                 // line 541
$context["form"]->getselect("socialSharing[projectId]", $this->getAttribute($this->getAttribute(                // line 542
($context["settings"] ?? null), "socialSharing", array()), "projectsList", array()), $this->getAttribute($this->getAttribute(                // line 543
($context["settings"] ?? null), "socialSharing", array()), "projectId", array()), array("style" => "width: 200px")), "social-buttons-project");
                // line 545
                echo "

                            ";
                // line 548
                echo "                            ";
                echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Social setup")),                 // line 549
$context["form"]->getbutton("button-social-setup", "Show social setup", array("class" => "button button-primary")), "social-setup-dialog", false);
                // line 550
                echo "


                            ";
                // line 553
                echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Gallery Sharing")),                 // line 554
$context["form"]->getcheckbox("socialSharing[gallerySharing][enabled]", true, (($this->getAttribute($this->getAttribute($this->getAttribute(                // line 557
($context["settings"] ?? null), "socialSharing", array()), "gallerySharing", array()), "enabled", array())) ? (array("checked" => "checked")) : (array()))), "gallery-social-sharing", "h4");
                // line 561
                echo "

                            ";
                // line 563
                echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Buttons position")),                 // line 564
$context["form"]->getselect("socialSharing[gallerySharing][buttonsPosition]", array("top" => "top", "bottom" => "bottom", "all" => "top and bottom"), $this->getAttribute($this->getAttribute($this->getAttribute(                // line 570
($context["settings"] ?? null), "socialSharing", array()), "gallerySharing", array()), "buttonsPosition", array()), array("style" => "width: 200px")), "gallery-sharing-buttons-position");
                // line 572
                echo "

                            ";
                // line 574
                echo $context["form"]->getrow("",                 // line 575
$context["form"]->getcheckbox("socialSharing[imageSharing][enabled]", "0", array("checked" => "checked")), "image-sharing-hidden");
                echo "

                            ";
                // line 577
                $context["enabled"] = $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "socialSharing", array()), "imageSharing", array()), "enabled", array());
                // line 578
                echo "                            ";
                echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Image Sharing")),                 // line 579
$context["form"]->getcheckbox("socialSharing[imageSharing][enabled]", true, (((                // line 582
($context["enabled"] ?? null) != "0")) ? (array("checked" => "checked")) : (array()))), "image-social-sharing", "h4");
                // line 586
                echo "

                            ";
                // line 588
                echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Buttons position")),                 // line 589
$context["form"]->getselect("socialSharing[imageSharing][buttonsPosition]", array("top" => "top", "bottom" => "bottom", "left" => "left", "right " => "right "), $this->getAttribute($this->getAttribute($this->getAttribute(                // line 596
($context["settings"] ?? null), "socialSharing", array()), "imageSharing", array()), "buttonsPosition", array()), array("style" => "width: 200px")), "image-sharing-buttons-position");
                // line 598
                echo "

                            ";
                // line 600
                echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Buttons align")),                 // line 601
$context["form"]->getselect("socialSharing[imageSharing][buttonsAlignHorizontal]", array("left" => "left", "center" => "center", "right" => "right"), $this->getAttribute($this->getAttribute($this->getAttribute(                // line 607
($context["settings"] ?? null), "socialSharing", array()), "imageSharing", array()), "buttonsAlignHorizontal", array()), array("style" => "width: 200px")), "image-sharing-buttons-align-horizontal");
                // line 609
                echo "

                            ";
                // line 611
                echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Buttons align")),                 // line 612
$context["form"]->getselect("socialSharing[imageSharing][buttonsAlignVertical]", array("top" => "top", "middle" => "middle", "bottom" => "bottom"), $this->getAttribute($this->getAttribute($this->getAttribute(                // line 618
($context["settings"] ?? null), "socialSharing", array()), "imageSharing", array()), "buttonsAlignVertical", array()), array("style" => "width: 200px")), "image-sharing-buttons-align-vertical");
                // line 620
                echo "

                            ";
                // line 622
                echo $context["form"]->getrow("",                 // line 623
$context["form"]->getcheckbox("socialSharing[popupImageSharing][enabled]", "0", array("checked" => "checked")), "popup-sharing-hidden");
                echo "

                            ";
                // line 625
                $context["enabled"] = $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "socialSharing", array()), "popupImageSharing", array()), "enabled", array());
                // line 626
                echo "                            ";
                echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Popup Image Sharing")),                 // line 627
$context["form"]->getcheckbox("socialSharing[popupImageSharing][enabled]", true, (((                // line 630
($context["enabled"] ?? null) != "0")) ? (array("checked" => "checked")) : (array()))), "popup-social-sharing", "h4");
                // line 634
                echo "

                            ";
                // line 636
                echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Buttons position")),                 // line 637
$context["form"]->getselect("socialSharing[popupImageSharing][buttonsPosition]", array("top" => "top", "bottom" => "bottom", "left" => "left", "right " => "right "), $this->getAttribute($this->getAttribute($this->getAttribute(                // line 644
($context["settings"] ?? null), "socialSharing", array()), "popupImageSharing", array()), "buttonsPosition", array()), array("style" => "width: 200px")), "popup-sharing-buttons-position");
                // line 646
                echo "

                            ";
                // line 648
                echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Buttons align")),                 // line 649
$context["form"]->getselect("socialSharing[popupImageSharing][buttonsAlignHorizontal]", array("left" => "left", "center" => "center", "right" => "right"), $this->getAttribute($this->getAttribute($this->getAttribute(                // line 655
($context["settings"] ?? null), "socialSharing", array()), "popupImageSharing", array()), "buttonsAlignHorizontal", array()), array("style" => "width: 200px")), "popup-sharing-buttons-align-horizontal");
                // line 657
                echo "

                            ";
                // line 659
                echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Buttons align")),                 // line 660
$context["form"]->getselect("socialSharing[popupImageSharing][buttonsAlignVertical]", array("top" => "top", "middle" => "middle", "bottom" => "bottom"), $this->getAttribute($this->getAttribute($this->getAttribute(                // line 666
($context["settings"] ?? null), "socialSharing", array()), "popupImageSharing", array()), "buttonsAlignVertical", array()), array("style" => "width: 200px")), "popup-sharing-buttons-align-vertical");
                // line 668
                echo "

                        ";
            } else {
                // line 671
                echo "                            <tr>
                                <td colspan=\"2\">
                                    <span>";
                // line 673
                echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("You have no Social Sharing projects for now.")), "html", null, true);
                echo " </span>
                                    <a href=\"/wp-admin/admin.php?page=supsystic-social-sharing&module=projects&action=add\"
                                       target=\"_blank\" rel=\"noopener noreferrer\"
                                    >";
                // line 676
                echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Create your first project")), "html", null, true);
                echo "</a>
                                    <span> ";
                // line 677
                echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("then just reload page with your Gallery settings, and you will see list with available Social Projects for your Gallery.")), "html", null, true);
                echo "</span>
                                </td>
                            </tr>
                        ";
            }
            // line 681
            echo "                    ";
        } else {
            // line 682
            echo "                        <tr>
                            <td colspan=\"2\">
                                <span>";
            // line 684
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("You need to install Social Share Buttons by Supsystic to use this feature.")), "html", null, true);
            echo " </span>
                                <a target=\"_blank\" rel=\"noopener noreferrer\" href=\"/wp-admin/plugin-install.php?tab=search&type=term&s=Social+Share+Buttons+by+Supsystic\"
                                >";
            // line 686
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Install plugin")), "html", null, true);
            echo "</a>
                                <span> ";
            // line 687
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("from your admin area, or visit it's official page on Wordpress.org")), "html", null, true);
            echo " </span>
                                <a target=\"_blank\" rel=\"noopener noreferrer\" href=\"https://wordpress.org/plugins/social-share-buttons-by-supsystic/\"> ";
            // line 688
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("here.")), "html", null, true);
            echo "</a>
                            </td>

                        </tr>
                    ";
        }
        // line 693
        echo "                    </tbody>
                </table>
                <div class=\"separator\"></div>
            ";
    }

    // line 722
    public function block_horizontalScroll($context, array $blocks = array())
    {
        // line 723
        echo "\t\t\t\t<table class=\"form-table\" id=\"gg-anl-horiz-scroll\">
\t\t\t\t\t<thead>
\t\t\t\t\t";
        // line 725
        $context["horizontalScrollEnabled"] = ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "horizontalScroll", array(), "any", false, true), "enabled", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "horizontalScroll", array(), "any", false, true), "enabled", array()), "false")) : ("false")) == "true");
        // line 726
        echo "\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Horizontal Scroll")), (((        // line 727
$context["form"]->getradio("horizontalScroll[enabled]", "true", Twig_SupTwg_array_merge(array("id" => "horizontal-scroll-enable"), ((($context["horizontalScrollEnabled"] ?? null)) ? (array("checked" => "checked")) : (array())))) .         // line 728
$context["f"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "horizontal-scroll-enable")) .         // line 729
$context["form"]->getradio("horizontalScroll[enabled]", "false", Twig_SupTwg_array_merge(array("id" => "horizontal-scroll-disable"), ((($context["horizontalScrollEnabled"] ?? null)) ? (array()) : (array("checked" => "checked")))))) .         // line 730
$context["f"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable")), "horizontal-scroll-disable")), "horizontal-scroll", true);
        echo "
\t\t\t\t\t</thead>
\t\t\t\t\t<tbody>
\t\t\t\t\t";
        // line 733
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Scroll Bar Color")),         // line 734
$context["form"]->gettext("horizontalScroll[color]", $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "horizontalScroll", array()), "color", array()), array("class" => "gg-color-picker")), "horizontal-scroll-color");
        echo "

\t\t\t\t\t";
        // line 736
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Scroll Bar Transparency")),         // line 737
$context["form"]->getselect("horizontalScroll[transparency]", array("0" => "0%", "10" => "10%", "20" => "20%", "30" => "30%", "40" => "40%", "50" => "50%", "60" => "60%", "70" => "70%", "80" => "80%", "90" => "90%", "100" => "100%"), (($this->getAttribute($this->getAttribute(        // line 751
($context["settings"] ?? null), "horizontalScroll", array(), "any", false, true), "transparency", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "horizontalScroll", array(), "any", false, true), "transparency", array()), "60")) : ("60")), array("style" => "width: auto")), "horizontal-scroll-transparency");
        // line 752
        echo "

\t\t\t\t\t";
        // line 754
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Mouse Wheel Scroll Step")),         // line 755
$context["form"]->gettext("horizontalScroll[mouseWheelStep]", (($this->getAttribute($this->getAttribute(        // line 757
($context["settings"] ?? null), "horizontalScroll", array(), "any", false, true), "mouseWheelStep", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "horizontalScroll", array(), "any", false, true), "mouseWheelStep", array()), 20)) : (20)), array()), "hscroll-mouse-wheel");
        // line 761
        echo "

\t\t\t\t\t";
        // line 763
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Touch Scroll Step")),         // line 764
$context["form"]->gettext("horizontalScroll[touchStep]", (($this->getAttribute($this->getAttribute(        // line 766
($context["settings"] ?? null), "horizontalScroll", array(), "any", false, true), "touchStep", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "horizontalScroll", array(), "any", false, true), "touchStep", array()), 200)) : (200)), array()), "hscroll-touch-gest");
        // line 770
        echo "

\t\t\t\t\t";
        // line 772
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Responsive Mode")),         // line 773
$context["form"]->getselect("horizontalScroll[responsiveMode]", array("0" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("None")), "1" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("One by One"))), (($this->getAttribute($this->getAttribute(        // line 778
($context["settings"] ?? null), "horizontalScroll", array(), "any", false, true), "responsiveMode", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "horizontalScroll", array(), "any", false, true), "responsiveMode", array()), "0")) : ("0")), array("style" => "width: auto")), "hScrollResponsiveMode");
        // line 782
        echo "

\t\t\t\t\t";
        // line 784
        $this->displayBlock('horizontalScrollAfter', $context, $blocks);
        // line 786
        echo "\t\t\t\t\t</tbody>
\t\t\t\t</table>
\t\t\t\t<div class=\"separator\"></div>
\t\t\t";
    }

    // line 784
    public function block_horizontalScrollAfter($context, array $blocks = array())
    {
        // line 785
        echo "\t\t\t\t\t";
    }

    // line 791
    public function block_border($context, array $blocks = array())
    {
        // line 792
        echo "                <table class=\"form-table\" name=\"border\" id=\"gg-anl-border-type\">
                    <thead>
                        ";
        // line 809
        echo "
                        ";
        // line 810
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Border Type")), (        // line 811
$context["form"]->getselect("thumbnail[border][type]", ($context["borderTypes"] ?? null), $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "border", array()), "type", array()), array("style" => "width: auto;")) .         // line 812
$context["form"]->getinput("text", "border-type", "Example", array("style" => "margin-top: -2px; height: 27px; width: 70px; border: 1px solid black; display:none;"))), "border-type", "gallery-borders");
        echo "

                        ";
        // line 814
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Border color")),         // line 815
$context["form"]->getinput("text", "thumbnail[border][color]", $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "border", array()), "color", array()), array("class" => "gg-color-picker")), "border-color");
        echo "

                        ";
        // line 817
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Border width")), (        // line 818
$context["form"]->getinput("number", "thumbnail[border][width]", $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "border", array()), "width", array()), array("style" => array("width" => "140px;"))) .         // line 819
$context["form"]->getspan("", "pixels")), "border-width");
        echo "
                    </thead>
                </table>
                <div class=\"separator\"></div>
            ";
    }

    // line 825
    public function block_shadow($context, array $blocks = array())
    {
        // line 826
        echo "                <table class=\"form-table\" name=\"shadow\" id=\"gg-anl-shadow\">
                    <thead>
                        <tr id=\"useShadowRow\">
                            <th scope=\"row\">
                                <h3 style=\"margin: 0 !important;\">
                                    ";
        // line 831
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Shadow")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t";
        // line 832
        echo $context["form"]->getshow_tooltip("sgg-t-shadow");
        echo "
                                </h3>
                            </th>
                            <td>
                                <input type=\"radio\" id=\"showShadow\" name=\"use_shadow\" value=\"1\" ";
        // line 836
        if (($this->getAttribute(($context["settings"] ?? null), "use_shadow", array()) == "1")) {
            echo "checked";
        }
        echo ">
                                    ";
        // line 837
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "html", null, true);
        echo "
                                <input type=\"radio\" id=\"hideShadow\" name=\"use_shadow\" value=\"0\" ";
        // line 838
        if (($this->getAttribute(($context["settings"] ?? null), "use_shadow", array()) != "1")) {
            echo "checked";
        }
        echo ">
                                    ";
        // line 839
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable")), "html", null, true);
        echo "
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope=\"row\">
                                ";
        // line 846
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Shadow effect preset")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t";
        // line 847
        echo $context["form"]->getshow_tooltip("sgg-t-shadow-eff-preset");
        echo "
                            </th>
                            <td>
                                <button id=\"chooseShadowPreset\" class=\"button bordered\" type=\"button\">
                                    ";
        // line 851
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Choose preset")), "html", null, true);
        echo "
                                </button>
                            </td>
                        </tr>

                        <tr id=\"useMouseShadowRow\">
                            <th scope=\"row\">
                                ";
        // line 858
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("When mouse is over")), "html", null, true);
        echo "
                                ";
        // line 859
        echo $context["form"]->getshow_tooltip("when-mouse-is-over");
        echo "
                            </th>
                            <td>
                                <select id=\"useMouseOverShadow\" style=\"width: auto;\" name=\"mouse_shadow\">
                                    <option value=\"0\" ";
        // line 863
        if (($this->getAttribute(($context["settings"] ?? null), "mouse_shadow", array()) == "0")) {
            echo "selected=\"selected\"";
        }
        echo ">
                                        ";
        // line 864
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Off")), "html", null, true);
        echo "
                                    </option>
                                    <option value=\"1\" ";
        // line 866
        if (($this->getAttribute(($context["settings"] ?? null), "mouse_shadow", array()) == "1")) {
            echo "selected=\"selected\"";
        }
        echo ">
                                        ";
        // line 867
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Show mouse on")), "html", null, true);
        echo "
                                    </option>
                                    <option value=\"2\" ";
        // line 869
        if (($this->getAttribute(($context["settings"] ?? null), "mouse_shadow", array()) == "2")) {
            echo "selected=\"selected\"";
        }
        echo ">
                                        ";
        // line 870
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Hide mouse on")), "html", null, true);
        echo "
                                    </option>
                                </select>
                            </td>
                        </tr>

                        ";
        // line 876
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Overlay image with shadow")),         // line 877
$context["form"]->getselect("thumbnail[shadow][overlay]", array(0 => "Off", 1 => "On"), $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "shadow", array()), "overlay", array()), array("style" => "width: auto;")), "overlay-type");
        echo "

                        ";
        // line 879
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Shadow color")),         // line 880
$context["form"]->gettext("thumbnail[shadow][color]", $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "shadow", array()), "color", array()), array("style" => array("width" => "300px"), "class" => "gg-color-picker")), "shadow-color");
        echo "

                        ";
        // line 882
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Shadow blur")),         // line 883
$context["form"]->getinput("number", "thumbnail[shadow][blur]", $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "shadow", array()), "blur", array()), array("style" => array("width" => "auto"))), "shadow-blur");
        echo "

                        ";
        // line 885
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Shadow X")),         // line 886
$context["form"]->getinput("number", "thumbnail[shadow][x]", $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "shadow", array()), "x", array()), array("style" => array("width" => "auto"))), "shadow-x");
        echo "

                        ";
        // line 888
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Shadow Y")),         // line 889
$context["form"]->getinput("number", "thumbnail[shadow][y]", $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "shadow", array()), "y", array()), array("style" => array("width" => "auto"))), "shadow-y");
        echo "
                    </tbody>
                </table>
                <div class=\"separator\"></div>
            ";
    }

    // line 895
    public function block_popup($context, array $blocks = array())
    {
        // line 896
        echo "                <table class=\"form-table\" id=\"gg-anl-popup\">
                    <thead>
                        ";
        // line 899
        echo "                        ";
        $context["popUpEnabled"] = ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array(), "any", false, true), "enabled", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array(), "any", false, true), "enabled", array()), "true")) : ("true")) == "true");
        // line 900
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Pop-up Image")), (((        // line 901
$context["form"]->getradio("box[enabled]", "true", Twig_SupTwg_array_merge(array("id" => "box-enable"), ((        // line 904
($context["popUpEnabled"] ?? null)) ? (array("checked" => "checked")) : (array())))) .         // line 906
$context["f"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "box-enable")) .         // line 910
$context["form"]->getradio("box[enabled]", "false", Twig_SupTwg_array_merge(array("id" => "box-disable"), ((        // line 913
($context["popUpEnabled"] ?? null)) ? (array()) : (array("checked" => "checked")))))) .         // line 915
$context["f"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable")), "box-disable")), "box", true);
        // line 919
        echo "
                    </thead>
                    <tbody>
                        ";
        // line 923
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Popup box theme")), ((        // line 924
$context["form"]->getbutton("chooseTheme", call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Choose theme")), array("class" => "button bordered", "id" => "chooseTheme")) .         // line 929
$context["form"]->gethidden("box[type]", $this->getAttribute($this->getAttribute(        // line 931
($context["settings"] ?? null), "box", array()), "type", array()))) .         // line 933
$context["form"]->gethidden("box[theme]", $this->getAttribute($this->getAttribute(        // line 935
($context["settings"] ?? null), "box", array()), "theme", array()), array("id" => "bigImageTheme"))), "sgg-t-popup-theme");
        // line 938
        echo "

                        ";
        // line 941
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable popup border")),         // line 942
$context["form"]->getcheckbox("popup[border][enable]", "on", ((($this->getAttribute($this->getAttribute($this->getAttribute(        // line 945
($context["settings"] ?? null), "popup", array()), "border", array()), "enable", array()) == "on")) ? (array("checked" => "checked")) : (array()))), "popup-border-enable");
        // line 948
        echo "

                        ";
        // line 950
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Pop up border type")),         // line 951
$context["form"]->getselect("popup[border][type]", ($context["borderTypes"] ?? null), $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "popup", array()), "border", array()), "type", array()), array("style" => "width: auto;")), "border-type-popup");
        // line 952
        echo "

                        ";
        // line 954
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Pop up border color")),         // line 955
$context["form"]->getinput("text", "popup[border][color]", $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "popup", array()), "border", array()), "color", array()), array("class" => "gg-color-picker")), "border-color-popup");
        echo "

                        ";
        // line 957
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Pop up border width")), (        // line 958
$context["form"]->getinput("number", "popup[border][width]", $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "popup", array()), "border", array()), "width", array()), array("style" => array("width" => "140px;"))) .         // line 959
$context["form"]->getspan("", "pixels")), "border-width-popup");
        echo "

                        ";
        // line 962
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable on mobile")),         // line 963
$context["form"]->getcheckbox("box[mobile]", "on", ((($this->getAttribute($this->getAttribute(        // line 966
($context["settings"] ?? null), "box", array()), "mobile", array()) == "on")) ? (array("checked" => "checked")) : (array()))), "mobile");
        // line 969
        echo "

                        ";
        // line 972
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Popup Image Text")),         // line 973
$context["form"]->getselect("box[imageText]", array("data-caption" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Caption")), "data-title" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Title")), "alt" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Alt text")), "data-description" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Description"))), (($this->getAttribute($this->getAttribute(        // line 981
($context["settings"] ?? null), "box", array(), "any", false, true), "imageText", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array(), "any", false, true), "imageText", array()), "data-description")) : ("data-description")), array("style" => "width: 150px")), "popup-image-text");
        // line 984
        echo "

                        ";
        // line 987
        echo "                        ";
        $this->displayBlock('popupLinkedImageText', $context, $blocks);
        // line 1012
        echo "
\t\t\t\t\t\t";
        // line 1014
        echo "\t\t\t\t\t\t";
        $this->displayBlock('disableSourceImageForLi', $context, $blocks);
        // line 1033
        echo "
                        ";
        // line 1035
        echo "                        ";
        $this->displayBlock('enableDownloadPhotosButton', $context, $blocks);
        // line 1054
        echo "
                        ";
        // line 1056
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Hide Popup Captions")),         // line 1057
$context["form"]->getcheckbox("box[captions]", "on", ((($this->getAttribute($this->getAttribute(        // line 1060
($context["settings"] ?? null), "box", array()), "captions", array()) == "on")) ? (array("checked" => "checked")) : (array()))), "captions");
        // line 1063
        echo "

\t\t\t\t\t\t";
        // line 1065
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Hide long captions")),         // line 1066
$context["form"]->getcheckbox("hideLongTooltipTitles", "on", ((($this->getAttribute(        // line 1069
($context["settings"] ?? null), "hideLongTooltipTitles", array()) == "on")) ? (array("checked" => "checked")) : (array()))), "hide-long-tooltip-titles");
        // line 1071
        echo "

                        ";
        // line 1074
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Background color")),         // line 1075
$context["form"]->gettext("box[background]", $this->getAttribute($this->getAttribute(        // line 1077
($context["settings"] ?? null), "box", array()), "background", array()), array("class" => "gg-color-picker")), "box-background");
        // line 1081
        echo "

                        ";
        // line 1084
        echo "\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Background transparency")),         // line 1085
$context["form"]->getselect("box[transparency]", array("0" => "0%", "10" => "10%", "20" => "20%", "30" => "30%", "40" => "40%", "50" => "50%", "60" => "60%", "70" => "70%", "80" => "80%", "90" => "90%", "100" => "100%"), (($this->getAttribute($this->getAttribute(        // line 1100
($context["settings"] ?? null), "box", array(), "any", false, true), "transparency", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array(), "any", false, true), "transparency", array()), 30)) : (30)), array("style" => "width: auto")), "box-transparency");
        // line 1103
        echo "

                        ";
        // line 1106
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Slideshow")),         // line 1107
$context["form"]->getselect("box[slideshow]", array("true" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "false" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable"))), (($this->getAttribute($this->getAttribute(        // line 1110
($context["settings"] ?? null), "box", array(), "any", false, true), "slideshow", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array(), "any", false, true), "slideshow", array()), "false")) : ("false")), array("style" => "width: auto")), "slideshow", "h4");
        // line 1115
        echo "

                        ";
        // line 1118
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Slideshow speed")),         // line 1119
$context["form"]->getinput("number", "box[slideshowSpeed]", (($this->getAttribute($this->getAttribute(        // line 1122
($context["settings"] ?? null), "box", array(), "any", false, true), "slideshowSpeed", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array(), "any", false, true), "slideshowSpeed", array()), 2500)) : (2500)), array("style" => array("width" => "auto")), "box-slideshowSpeed"), "sgg-t-popup-slide-show-speed");
        // line 1126
        echo "

                        ";
        // line 1129
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Slideshow pause on hover")),         // line 1130
$context["form"]->getselect("box[popupHoverStop]", array("true" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Yes")), "false" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("No"))), (($this->getAttribute($this->getAttribute(        // line 1133
($context["settings"] ?? null), "box", array(), "any", false, true), "popupHoverStop", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array(), "any", false, true), "popupHoverStop", array()), "true")) : ("true")), array("style" => "width: auto"), "box-popupHoverStop"), "popupHoverStop");
        // line 1138
        echo "

                        ";
        // line 1141
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Slideshow autostart")),         // line 1142
$context["form"]->getselect("box[slideshowAuto]", array("true" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Yes")), "false" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("No"))), (($this->getAttribute($this->getAttribute(        // line 1145
($context["settings"] ?? null), "box", array(), "any", false, true), "slideshowAuto", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "box", array(), "any", false, true), "slideshowAuto", array()), "false")) : ("false")), array("style" => "width: auto"), "box-slideshowAuto"), "sgg-t-popup-slideshow-autostart");
        // line 1149
        echo "

                        ";
        // line 1152
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Popup Image size")), (((        // line 1153
$context["form"]->getinput("number", "box[popupwidth]", $this->getAttribute($this->getAttribute(        // line 1156
($context["settings"] ?? null), "box", array()), "popupwidth", array()), array("style" => array("width" => "60px"))) .         // line 1159
$context["form"]->getspan("", "x")) .         // line 1160
$context["form"]->getinput("number", "box[popupheight]", $this->getAttribute($this->getAttribute(        // line 1163
($context["settings"] ?? null), "box", array()), "popupheight", array()), array("style" => array("width" => "60px")))) .         // line 1166
$context["form"]->getspan("", "pixels")), "box-popupsize");
        // line 1168
        echo "


                        ";
        // line 1172
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable browser history")),         // line 1174
$context["form"]->getcheckbox("box[disableHistory]", "true", ((($this->getAttribute($this->getAttribute(        // line 1177
($context["settings"] ?? null), "box", array()), "disableHistory", array()) == "true")) ? (array("checked" => "checked")) : (array()))), "box-disableHistory");
        // line 1180
        echo "

                        ";
        // line 1183
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable change url")),         // line 1185
$context["form"]->getcheckbox("box[disableChangeUrl]", "true", ((($this->getAttribute($this->getAttribute(        // line 1188
($context["settings"] ?? null), "box", array()), "disableChangeUrl", array()) == "true")) ? (array("checked" => "checked")) : (array()))), "box-disableChangeUrl");
        // line 1191
        echo "

                        ";
        // line 1194
        echo "                        ";
        $this->displayBlock('popupAfter', $context, $blocks);
        // line 1274
        echo "                    </tbody>
                </table>
\t\t\t\t";
        // line 1276
        echo $context["form"]->gethidden("popup[placementType]", (($this->getAttribute($this->getAttribute(        // line 1278
($context["settings"] ?? null), "popup", array(), "any", false, true), "placementType", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "popup", array(), "any", false, true), "placementType", array()), 0)) : (0)), array("id" => "popupPlacementTypeHidden"));
        // line 1280
        echo "
                <div class=\"separator\"></div>
            ";
    }

    // line 987
    public function block_popupLinkedImageText($context, array $blocks = array())
    {
        // line 988
        echo "                            <tr>
                                <th scope=\"row\">
                                    <label style=\"margin: 0 !important;\">
                                        ";
        // line 991
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Popup Linked Image Text")), "html", null, true);
        echo "
                                        ";
        // line 992
        echo $context["form"]->getshow_tooltip("popupLinkedImageTextPro");
        echo "
                                        <br />
                                        <label><a href=\"";
        // line 994
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("utm_source=plugin&utm_medium=linkedImageText&utm_campaign=gallery")), "html", null, true);
        echo "\" target=\"_blank\" style=\"color: #0074a2; font-size: 10px; text-decoration: none;\">PRO Option</a> </label>
                                    </label>
                                </th>
                                <td>
                                    ";
        // line 998
        echo $context["form"]->getselect("box[linkedImageTextFree]", array("data-title" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Title")), "alt" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Alt text")), "data-description" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Description"))), "data-title", array("style" => "width: 150px", "disabled" => "", "id" => "ptsLinkTextChoose"));
        // line 1008
        echo "
                                </td>
                            </tr>
                        ";
    }

    // line 1014
    public function block_disableSourceImageForLi($context, array $blocks = array())
    {
        // line 1015
        echo "\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<th scope=\"row\">
\t\t\t\t\t\t\t\t\t<label style=\"margin: 0 !important;\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1018
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable source image for Linked Images")), "html", null, true);
        echo "
                                        ";
        // line 1019
        echo $context["form"]->getshow_tooltip("disableSourceImageForLiPro");
        echo "
\t\t\t\t\t\t\t\t\t\t<br />
\t\t\t\t\t\t\t\t\t\t<label><a href=\"";
        // line 1021
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("utm_source=plugin&utm_medium=linkedImageText&utm_campaign=gallery")), "html", null, true);
        echo "\" target=\"_blank\" style=\"color: #0074a2; font-size: 10px; text-decoration: none;\">PRO Option</a> </label>
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t";
        // line 1025
        echo $context["form"]->getcheckbox("box[disableSourceImageForLiFree]", "1", array("disabled" => "disabled"));
        // line 1029
        echo "
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t";
    }

    // line 1035
    public function block_enableDownloadPhotosButton($context, array $blocks = array())
    {
        // line 1036
        echo "                            <tr>
                                <th scope=\"row\">
                                    <label style=\"margin: 0 !important;\">
                                        ";
        // line 1039
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable Download Photos Button")), "html", null, true);
        echo "
                                        ";
        // line 1040
        echo $context["form"]->getshow_tooltip("enableDownloadPhotosButtonPro");
        echo "
                                        <br />
                                        <label><a href=\"";
        // line 1042
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("utm_source=plugin&utm_medium=linkedImageText&utm_campaign=gallery")), "html", null, true);
        echo "\" target=\"_blank\" style=\"color: #0074a2; font-size: 10px; text-decoration: none;\">PRO Option</a> </label>
                                    </label>
                                </th>
                                <td>
                                    ";
        // line 1046
        echo $context["form"]->getcheckbox("box[enableDownloadPhotosButtonFree]", "1", array("disabled" => "disabled"));
        // line 1050
        echo "
                                </td>
                            </tr>
                        ";
    }

    // line 1194
    public function block_popupAfter($context, array $blocks = array())
    {
        // line 1195
        echo "                            ";
        // line 1196
        echo "                            ";
        echo $context["form"]->getrowpro(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Video size")), "utm_source=plugin&utm_medium=video&utm_campaign=gallery", "video.size", (((        // line 1199
$context["form"]->gettext("popup[video][width]", (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 1201
($context["settings"] ?? null), "popup", array(), "any", false, true), "video", array(), "any", false, true), "width", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "popup", array(), "any", false, true), "video", array(), "any", false, true), "width", array()), "853")) : ("853")), array("style" => array("width" => "40px"), "disabled" => "")) .         // line 1204
$context["form"]->getspan("", "x")) .         // line 1205
$context["form"]->gettext("popup[video][height]", (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 1207
($context["settings"] ?? null), "popup", array(), "any", false, true), "video", array(), "any", false, true), "height", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "popup", array(), "any", false, true), "video", array(), "any", false, true), "height", array()), "480")) : ("480")), array("style" => array("width" => "40px"), "disabled" => ""))) .         // line 1210
$context["form"]->getspan("", "pixels")));
        // line 1211
        echo "

                            ";
        // line 1214
        echo "                            ";
        echo $context["form"]->getrowpro(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Autoplay video")), "utm_source=plugin&utm_medium=video&utm_campaign=gallery", "video.autoplay",         // line 1217
$context["form"]->getselect("popup[video][autoplay]", array("false" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("No")), "true" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Yes"))), (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 1220
($context["settings"] ?? null), "popup", array(), "any", false, true), "video", array(), "any", false, true), "autoplay", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "popup", array(), "any", false, true), "video", array(), "any", false, true), "autoplay", array()), "false")) : ("false")), array("disabled" => "")));
        // line 1223
        echo "

                            ";
        // line 1226
        echo "                            ";
        echo $context["form"]->getrowpro(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("When video ends")), "utm_source=plugin&utm_medium=video&utm_campaign=gallery", "video.onEnd",         // line 1229
$context["form"]->getselect("popup[video][onEnd]", array("0" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Do nothing")), "1" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Open next slide")), "2" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Close popup"))), (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 1236
($context["settings"] ?? null), "popup", array(), "any", false, true), "video", array(), "any", false, true), "onEnd", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "popup", array(), "any", false, true), "video", array(), "any", false, true), "onEnd", array()), "0")) : ("0")), array("disabled" => "")));
        // line 1239
        echo "

\t\t\t\t\t\t\t";
        // line 1241
        echo $context["form"]->getrowpro(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Show rotate button")), "utm_source=plugin&utm_medium=popup_show_rotate_btn&utm_campaign=gallery", "box[freeSRB]",         // line 1244
$context["form"]->getcheckbox("box[freeSRB]", 1, array("disabled" => "")));
        // line 1249
        echo "

\t\t\t\t\t\t\t";
        // line 1251
        echo $context["form"]->getrowpro(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Show details button")), "utm_source=plugin&utm_medium=popup_show_details_button&utm_campaign=gallery", "box[freeSLB]",         // line 1254
$context["form"]->getcheckbox("box[freeSLB]", 1, array("disabled" => "")));
        // line 1259
        echo "



\t\t\t\t\t\t\t";
        // line 1263
        echo $context["form"]->getrowpro(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Show On hover thumbnail")), "utm_source=plugin&utm_medium=popup_show_thumbnail_on_hover&utm_campaign=gallery", "box[freeSTFOH]",         // line 1266
$context["form"]->getcheckbox("box[freeSTFOH]", 1, array("disabled" => "")));
        // line 1271
        echo "

                        ";
    }

    // line 1284
    public function block_lazyload($context, array $blocks = array())
    {
        // line 1285
        echo "\t\t\t\t<table class=\"form-table\" name=\"lazyload\" id=\"gg-anl-lazyload\">
\t\t\t\t\t<thead>
\t\t\t\t\t";
        // line 1288
        echo "\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Lazy Load")), (((        // line 1289
$context["form"]->getradio("lazyload[enabled]", "1", Twig_SupTwg_array_merge(array("id" => "lazyLoadEnabled"), ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "lazyload", array()), "enabled", array()) == "1")) ? (array("checked" => "checked")) : (array())))) .         // line 1290
$context["f"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "lazyLoadEnabled")) .         // line 1291
$context["form"]->getradio("lazyload[enabled]", "0", Twig_SupTwg_array_merge(array("id" => "lazyLoadDisabled"), ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "lazyload", array()), "enabled", array()) == "1")) ? (array()) : (array("checked" => "checked")))))) .         // line 1292
$context["f"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable")), "lazyLoadDisabled")), "sgg-t-lazyload-enable", true, "sggLazyLoadEnableRow");
        echo "
\t\t\t\t\t</thead>
\t\t\t\t\t<tbody>
\t\t\t\t\t\t";
        // line 1295
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Hide loader")),         // line 1297
$context["form"]->getcheckbox("lazyload[hideLoader]", "true", ((($this->getAttribute($this->getAttribute(        // line 1300
($context["settings"] ?? null), "lazyload", array()), "hideLoader", array()) == "true")) ? (array("checked" => "checked")) : (array()))), "lazyload-hideLoader");
        // line 1303
        echo "
                        ";
        // line 1304
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Animation effect")),         // line 1306
$context["form"]->getselect("lazyload[animationEffect]", array("show" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("show")), "fadeIn" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("fade")), "slideDown" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("slide"))), (($this->getAttribute($this->getAttribute(        // line 1313
($context["settings"] ?? null), "lazyload", array(), "any", false, true), "animationEffect", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "lazyload", array(), "any", false, true), "animationEffect", array()), "0")) : ("0"))));
        // line 1315
        echo "
                        ";
        // line 1316
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Effect duration")),         // line 1318
$context["form"]->getselect("lazyload[effectDuration]", array("400" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("default")), "0" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("none")), "200" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("fast")), "600" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("slow")), "2000" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("very slow"))), (($this->getAttribute($this->getAttribute(        // line 1327
($context["settings"] ?? null), "lazyload", array(), "any", false, true), "effectDuration", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "lazyload", array(), "any", false, true), "effectDuration", array()), "400")) : ("400"))));
        // line 1329
        echo "
\t\t\t\t\t\t<input type=\"hidden\" value=\"";
        // line 1330
        echo Twig_SupTwg_escape_filter($this->env, (($context["pluginUrl"] ?? null) . "/assets/img/loading.gif"), "html", null, true);
        echo "\" name=\"lazyload[defaultImgUrl]\"/>
\t\t\t\t\t\t<input type=\"hidden\" value=\"";
        // line 1331
        echo Twig_SupTwg_escape_filter($this->env, (($context["pluginUrl"] ?? null) . "/assets/img/leer.png"), "html", null, true);
        echo "\" name=\"lazyload[leerImgUrl]\"/>
\t\t\t\t\t</tbody>
\t\t\t\t</table>
\t\t\t";
    }

    // line 1336
    public function block_preload($context, array $blocks = array())
    {
        // line 1337
        echo "                <table class=\"form-table\" name=\"preload\" id=\"gg-anl-preloader\">
                    <thead>
                        ";
        // line 1339
        $context["preloadEnabled"] = ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "preload", array(), "any", false, true), "enabled", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "preload", array(), "any", false, true), "enabled", array()), "true")) : ("true")) == "true");
        // line 1340
        echo "                        ";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Gallery Loader")), (((        // line 1341
$context["form"]->getradio("preload[enabled]", "true", Twig_SupTwg_array_merge(array("id" => "preload-enable"), ((($context["preloadEnabled"] ?? null)) ? (array("checked" => "checked")) : (array())))) .         // line 1342
$context["f"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "preload-enable")) .         // line 1343
$context["form"]->getradio("preload[enabled]", "false", Twig_SupTwg_array_merge(array("id" => "preload-disable"), ((($context["preloadEnabled"] ?? null)) ? (array()) : (array("checked" => "checked")))))) .         // line 1344
$context["f"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable")), "preload-disable")), "preload", true);
        echo "
                    </thead>
                ";
        // line 1346
        if ( !$this->getAttribute(($context["environment"] ?? null), "isPro", array(), "method")) {
            // line 1347
            echo "                    <tbody>
                        <tr id=\"preload-background\">
                            <th scope=\"row\">
                                <label style=\"margin: 0 !important;\">
                                    ";
            // line 1351
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Background color")), "html", null, true);
            echo "
                                    <br />
                                    <label><a href=\"";
            // line 1353
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("utm_source=plugin&utm_medium=loader&utm_campaign=gallery")), "html", null, true);
            echo "\" target=\"_blank\" style=\"color: #0074a2; font-size: 10px; text-decoration: none;\">PRO Option</a> </label>
                                </label>
                            </th>
                            <td>
                                ";
            // line 1357
            echo $context["form"]->gettext("preload[background]", "#0073AA", array("class" => "gg-color-picker", "id" => "preloadColor-free"));
            echo "
                            </td>
                        </tr>
                        ";
            // line 1360
            $context["piconImg"] = ('' === $tmp = "                            <div class=\"gallery-loading\">
                                <div class=\"blocks\">
                                    <div class=\"block\"></div>
                                    <div class=\"block\"></div>
                                    <div class=\"block\"></div>
                                    <div class=\"block\"></div>
                                </div>
                            </div>
                        ") ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
            // line 1370
            echo "
                        <tr>
                            <th scope=\"row\">
                                <label style=\"margin: 0 !important;\">
                                    ";
            // line 1374
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Choose Icon")), "html", null, true);
            echo "
                                    ";
            // line 1375
            echo $context["form"]->getshow_tooltip("chooseIconPro");
            echo "
                                    <br />
                                    <label><a href=\"";
            // line 1377
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("utm_source=plugin&utm_medium=loader&utm_campaign=gallery")), "html", null, true);
            echo "\" target=\"_blank\" style=\"color: #0074a2; font-size: 10px; text-decoration: none;\">PRO Option</a> </label>
                                </label>
                            </th>
                            <td>
                                ";
            // line 1381
            echo $context["form"]->getbutton("buttons-preload-icon", "Choose Icon", array("class" => "button button-primary", "id" => "choosePreicon-free"));
            echo "
                                ";
            // line 1382
            echo Twig_SupTwg_escape_filter($this->env, ($context["piconImg"] ?? null), "html", null, true);
            echo "
                            </td>
                        </tr>
                    </tbody>
                ";
        }
        // line 1387
        echo "                </table>
            ";
    }

    // line 1390
    public function block_attributes($context, array $blocks = array())
    {
        // line 1391
        echo "                <table class=\"form-table\" name=\"attributes\" id=\"gg-anl-attributes\">
                    <thead>
                    \t";
        // line 1393
        echo $context["form"]->getrowpro(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Custom Attributes")), "utm_source=plugin&utm_campaign=gallery", "customAttributes", (((        // line 1396
$context["form"]->getradio("attributes[enabled]", "true", array("id" => "attributes-enable", "disabled" => "disabled")) .         // line 1397
$context["form"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "attributes-enable")) .         // line 1398
$context["form"]->getradio("attributes[enabled]", "false", array("id" => "attributes-disable", "checked" => "checked", "disabled" => "disabled"))) .         // line 1399
$context["form"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable")), "attributes-disable")), true, 1);
        // line 1400
        echo "
                    </thead>
                </table>
            ";
    }

    // line 1405
    public function block_additionalCaptionSettings($context, array $blocks = array())
    {
        // line 1406
        echo "\t\t\t\t<table class=\"form-table\" name=\"captionAdditSett\" id=\"gg-anl-caption-add-sett\">
\t\t\t\t\t<thead>
\t\t\t\t\t\t";
        // line 1408
        echo $context["form"]->getrowpro(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Thumbnail transformations")), "utm_source=plugin&utm_medium=additinalCaptionSettings&utm_campaign=gallery", "additionalCaptionSettingInPro", (((        // line 1411
$context["form"]->getradio("captionEffectSettings[Enable]", 1, array("id" => "captEffSettEnable", "class" => "captAdditEffectSettEnbl", "disabled" => "disabled")) .         // line 1416
$context["form"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "captEffSettEnable")) .         // line 1420
$context["form"]->getradio("captionEffectSettings[Enable]", 0, array("id" => "captEffDisable", "class" => "captAdditEffectSettEnbl", "checked" => "checked", "disabled" => "disabled"))) .         // line 1425
$context["form"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable")), "captEffDisable")), true, 1);
        // line 1431
        echo "
\t\t\t\t\t</thead>
\t\t\t\t</table>
\t\t\t";
    }

    // line 1442
    public function block_post($context, array $blocks = array())
    {
        // line 1443
        echo "            <div data-tab=\"post\">
                <h1 style=\"line-height: 1;\">
                    ";
        // line 1445
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Posts layout")), "html", null, true);
        echo "
                    ";
        // line 1446
        echo $context["form"]->getshow_tooltip("postsLayoutPro");
        echo "
                    </br>
                    <a class=\"button get-pro\" target=\"_blank\"
                       href=\"";
        // line 1449
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("?utm_source=plugin&utm_medium=postfeed&utm_campaign=gallery")), "html", null, true);
        echo "\">Get
                        PRO for 39\$</a>
                </h1>

                <div>
                    <a href=\"";
        // line 1454
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("?utm_source=plugin&utm_medium=postfeed&utm_campaign=gallery")), "html", null, true);
        echo "\" target=\"_blank\">
                        <img style=\"max-width:796px;\" src=\"";
        // line 1455
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["environment"] ?? null), "getModule", array(0 => "core"), "method"), "getCdnUrl", array(), "method"), "html", null, true);
        echo "_assets/gallery/img/settings/posts_layout.gif\" title=\"Available in PRO version\" />
                    </a>
                </div>
            </div>
        ";
    }

    // line 1509
    public function block_captionSettingsType($context, array $blocks = array())
    {
        // line 1510
        echo "\t\t\t\t<table class=\"form-table captions-settings-type\" name=\"captionSettingsType\">
\t\t\t\t\t<tbody>
\t\t\t\t\t\t";
        // line 1512
        echo $context["form"]->getrowpro(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Use Caption Builder")), "utm_source=plugin&utm_medium=caption_settings_type&utm_campaign=gallery", "caption-settings-type-pro", (((        // line 1515
$context["form"]->getradio("captionBuilder[enabled]", 1, array("id" => "ggsShowUserCaptionBuilder", "class" => "ggUserCaptionBuilderCl", "disabled" => "disabled")) .         // line 1520
$context["f"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "ggsShowUserCaptionBuilder")) .         // line 1524
$context["form"]->getradio("captionBuilder[enabled]", 0, array("id" => "ggsHideUserCaptionBuilder", "class" => "ggUserCaptionBuilderCl", "disabled" => "disabled", "checked" => "checked"))) .         // line 1529
$context["f"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable")), "ggsHideUserCaptionBuilder")), "useCaptionBuilder", true);
        // line 1535
        echo "
\t\t\t\t\t</tbody>
\t\t\t\t</table>
\t\t\t";
    }

    // line 1550
    public function block_overlaySettings($context, array $blocks = array())
    {
        // line 1551
        echo "\t\t\t\t\t\t<table class=\"form-table\" name=\"captions\">
\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t";
        // line 1554
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Captions")), (((        // line 1555
$context["form"]->getradio("thumbnail[overlay][enabled]", "true", Twig_SupTwg_array_merge(array("id" => "showCaptions"), ((        // line 1558
($context["enableCaptions"] ?? null)) ? (array("checked" => "checked")) : (array())))) .         // line 1560
$context["f"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "showCaptions")) .         // line 1564
$context["form"]->getradio("thumbnail[overlay][enabled]", "false", Twig_SupTwg_array_merge(array("id" => "hideCaptions"), ((        // line 1567
($context["enableCaptions"] ?? null)) ? (array()) : (array("checked" => "checked")))))) .         // line 1569
$context["f"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable")), "hideCaptions")), "sgg-ci-caption-enable", true, "useCaptions");
        // line 1574
        echo "

\t\t\t\t\t\t\t";
        // line 1577
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Effect")),         // line 1578
$context["form"]->getbutton("", call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Choose effect")), array("id" => "chooseEffect", "class" => "button bordered")), "chooseEffect");
        // line 1584
        echo "

\t\t\t\t\t\t\t";
        // line 1587
        echo "\t\t\t\t\t\t\t";
        $this->displayBlock('backgroundImageForHoverEffect', $context, $blocks);
        // line 1602
        echo "
\t\t\t\t\t\t\t";
        // line 1604
        echo "\t\t\t\t\t\t\t";
        $this->displayBlock('backgroundColorForShowOnHover', $context, $blocks);
        // line 1617
        echo "
\t\t\t\t\t\t\t";
        // line 1619
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Personal captions")),         // line 1620
$context["form"]->getselect("thumbnail[overlay][personal]", array("true" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "false" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable"))), (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 1623
($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "personal", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "personal", array()), "false")) : ("false")), array("style" => "width: auto;")), "overlay-personal");
        // line 1627
        echo "

\t\t\t\t\t\t\t";
        // line 1630
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Polaroid Style")),         // line 1631
$context["form"]->getselect("", array("true" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "false" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable"))),         // line 1634
($context["polaroidIsEnable"] ?? null), array("style" => "width: auto;", "class" => "polaroid-effect-class")), "polaroid-effect", "h4");
        // line 1639
        echo "

\t\t\t\t\t\t\t";
        // line 1642
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Polaroid Image Animation")),         // line 1643
$context["form"]->getselect("thumbnail[overlay][polaroidAnimation]", array("true" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "false" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable"))), (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 1646
($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "polaroidAnimation", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "polaroidAnimation", array()), "true")) : ("true")), array("style" => "width: auto;")), "polaroid-animation");
        // line 1650
        echo "

\t\t\t\t\t\t\t";
        // line 1653
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Polaroid Image Scattering ")),         // line 1654
$context["form"]->getselect("thumbnail[overlay][polaroidScattering]", array("true" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "false" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable"))), (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 1657
($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "polaroidScattering", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "polaroidScattering", array()), "true")) : ("true")), array("style" => "width: auto;")), "polaroid-scattering");
        // line 1661
        echo "

\t\t\t\t\t\t\t";
        // line 1664
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Polaroid Frame Width")),         // line 1665
$context["form"]->getinput("number", "thumbnail[overlay][polaroidFrameWidth]", (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 1668
($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "polaroidFrameWidth", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "polaroidFrameWidth", array()), 20)) : (20)), array("style" => array("width" => "140px"))), "polaroid-frame-width", null, "polaroid-fram-width-row");
        // line 1674
        echo "

\t\t\t\t\t\t\t";
        // line 1677
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Background color")),         // line 1678
$context["form"]->gettext("thumbnail[overlay][background]", $this->getAttribute($this->getAttribute($this->getAttribute(        // line 1680
($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "background", array()), array("class" => "gg-color-picker")), "overlay-background");
        // line 1684
        echo "

\t\t\t\t\t\t\t";
        // line 1687
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Text color")),         // line 1688
$context["form"]->gettext("thumbnail[overlay][foreground]", $this->getAttribute($this->getAttribute($this->getAttribute(        // line 1690
($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "foreground", array()), array("class" => "gg-color-picker")), "overlay-foreground");
        // line 1694
        echo "

\t\t\t\t\t\t\t";
        // line 1697
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Transparency")),         // line 1698
$context["form"]->getselect("thumbnail[overlay][transparency]", array(0 => "0%", 1 => "10%", 2 => "20%", 3 => "30%", 4 => "40%", 5 => "50%", 6 => "60%", 7 => "70%", 8 => "80%", 9 => "90%", 10 => "100%"), (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 1701
($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "transparency", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "overlay", array(), "any", false, true), "transparency", array()), 9)) : (9)), array("style" => "width: auto;")), "overlay-transparency");
        // line 1705
        echo "

\t\t\t\t\t\t\t";
        // line 1708
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Text size")), (        // line 1709
$context["form"]->getinput("number", "thumbnail[overlay][text_size]", $this->getAttribute($this->getAttribute($this->getAttribute(        // line 1712
($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size", array()), array("style" => array("width" => "140px"))) .         // line 1715
$context["form"]->getselect("thumbnail[overlay][text_size_unit]", array(0 => "pixels", 1 => "percents", 2 => "ems"), $this->getAttribute($this->getAttribute($this->getAttribute(        // line 1718
($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size_unit", array()), array("style" => "margin-top: -2px; height: 27px"))), "text-size");
        // line 1722
        echo "

\t\t\t\t\t\t\t";
        // line 1725
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Text horizontal align")),         // line 1726
$context["form"]->getselect("thumbnail[overlay][text_align]", array("left" => "Left", "right" => "Right", "center" => "Center", "auto" => "Auto"), $this->getAttribute($this->getAttribute($this->getAttribute(        // line 1729
($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_align", array()), array("style" => "width: auto;")), "text-align");
        // line 1733
        echo "

\t\t\t\t\t\t\t";
        // line 1736
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Text vertical align")),         // line 1737
$context["form"]->getselect("thumbnail[overlay][position]", array("top" => "Top", "middle" => "Middle", "bottom" => "Bottom"), $this->getAttribute($this->getAttribute($this->getAttribute(        // line 1740
($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "position", array()), array("style" => "width: auto;")), "overlay-position");
        // line 1744
        echo "

\t\t\t\t\t\t\t";
        // line 1747
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Font family")),         // line 1748
$context["form"]->getselectv("thumbnail[overlay][font_family]",         // line 1750
($context["fontList"] ?? null), $this->getAttribute($this->getAttribute($this->getAttribute(        // line 1751
($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "font_family", array()), array("style" => "width: auto;")), "font-family");
        // line 1755
        echo "


\t\t\t\t\t\t\t";
        // line 1759
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Hide image title")),         // line 1760
$context["form"]->getselect("thumbnail[tooltip]", array("false" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("No")), "true" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Yes"))), $this->getAttribute($this->getAttribute(        // line 1763
($context["settings"] ?? null), "thumbnail", array()), "tooltip", array()), array("style" => "width: auto;")), "tooltip");
        // line 1767
        echo "

\t\t\t\t\t\t\t";
        // line 1770
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Always show captions on mobile")),         // line 1771
$context["form"]->getselect("thumbnail[isMobile]", array("false" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("No")), "true" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Yes"))), (($this->getAttribute($this->getAttribute(        // line 1774
($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "isMobile", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "isMobile", array()), "false")) : ("false"))), "ismobile");
        // line 1777
        echo "

\t\t\t\t\t\t\t";
        // line 1780
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable captions on mobile")),         // line 1781
$context["form"]->getselect("thumbnail[isDisableMobileCaption]", array("false" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("No")), "true" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Yes"))), (($this->getAttribute($this->getAttribute(        // line 1784
($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "isDisableMobileCaption", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array(), "any", false, true), "isDisableMobileCaption", array()), "false")) : ("false"))), "isDisableMobileCaption");
        // line 1787
        echo "
\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t</table>

\t\t\t\t\t\t<div class=\"separator\"></div>
\t\t\t\t\t";
    }

    // line 1587
    public function block_backgroundImageForHoverEffect($context, array $blocks = array())
    {
        // line 1588
        echo "\t\t\t\t\t\t\t\t";
        echo $context["form"]->getrowpro(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Image on hover")), "utm_source=plugin&utm_medium=hover_caption_image_bg&utm_campaign=gallery", "overlay-effect-image-on-hover-enable",         // line 1591
$context["form"]->getselect("thumbnail[overlay][imageOnHoverEnable]", array("0" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable")), "1" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable"))), "0", array("disabled" => "disabled")));
        // line 1600
        echo "
\t\t\t\t\t\t\t";
    }

    // line 1604
    public function block_backgroundColorForShowOnHover($context, array $blocks = array())
    {
        // line 1605
        echo "\t\t\t\t\t\t\t\t";
        echo $context["form"]->getrowpro(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Background color for \"Show on hover\"")), "utm_source=plugin&utm_medium=caption-show-on-hover&utm_campaign=gallery", "backgroundColorForShowOnHoverFree",         // line 1608
$context["form"]->getselect("thumbnail[overlay][backgroundFoShowOnHover]", array("0" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable"))), 0, array("disabled" => "disabled")));
        // line 1615
        echo "
\t\t\t\t\t\t\t";
    }

    // line 1794
    public function block_icons($context, array $blocks = array())
    {
        // line 1795
        echo "\t\t\t\t\t\t<table class=\"form-table\" name=\"icons\">
\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t";
        // line 1797
        $context["iconsEnabled"] = ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "enabled", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "enabled", array()), "false")) : ("false")) == "true");
        // line 1798
        echo "\t\t\t\t\t\t\t";
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Icons")), (((        // line 1799
$context["form"]->getradio("icons[enabled]", "true", Twig_SupTwg_array_merge(array("id" => "icons-enable"), ((($context["iconsEnabled"] ?? null)) ? (array("checked" => "checked")) : (array())))) .         // line 1800
$context["form"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Enable")), "icons-enable")) .         // line 1801
$context["form"]->getradio("icons[enabled]", "false", Twig_SupTwg_array_merge(array("id" => "icons-disable"), ((($context["iconsEnabled"] ?? null)) ? (array()) : (array("checked" => "checked")))))) .         // line 1802
$context["form"]->getlabel(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Disable")), "icons-disable")), "photo-icon", true);
        // line 1803
        echo "
\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t";
        // line 1806
        echo $context["form"]->getrow(call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Animation effects")),         // line 1807
$context["form"]->getbutton(null, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Animation")), array("class" => "button bordered", "id" => "selectIconsEffect")), "ci-icons-animation-effects");
        // line 1809
        echo "
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<th scope=\"row\">
\t\t\t\t\t\t\t\t\t<label for=\"iconsColor\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1813
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Icons color")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t";
        // line 1814
        echo $context["form"]->getshow_tooltip("ci-icons-color");
        echo "
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t<input type=\"text\" id=\"iconsColor\" class=\"gg-color-picker\" value=\"";
        // line 1818
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "color", array()), "html", null, true);
        echo "\" name=\"icons[color]\"/>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<th scope=\"row\">
\t\t\t\t\t\t\t\t\t<label for=\"iconsHoverColor\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1824
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Icons hover color")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t";
        // line 1825
        echo $context["form"]->getshow_tooltip("ci-icons-hover-color");
        echo "
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t<input type=\"text\" id=\"iconsHoverColor\" class=\"gg-color-picker\" value=\"";
        // line 1829
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "hover_color", array()), "html", null, true);
        echo "\" name=\"icons[hover_color]\"/>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<th scope=\"row\">
\t\t\t\t\t\t\t\t\t<label for=\"iconsBackgroundColor\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1835
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Background color")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t";
        // line 1836
        echo $context["form"]->getshow_tooltip("ci-icons-bg-color");
        echo "
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t<input type=\"text\" id=\"iconsBackgroundColor\" class=\"gg-color-picker\" value=\"";
        // line 1840
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "background", array()), "html", null, true);
        echo "\" name=\"icons[background]\"/>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<th scope=\"row\">
\t\t\t\t\t\t\t\t\t<label for=\"iconsBackgroundHoverColor\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1846
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Background hover color")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t";
        // line 1847
        echo $context["form"]->getshow_tooltip("ci-icons-hover-bg-color");
        echo "
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t<input type=\"text\" id=\"iconsBackgroundHoverColor\" class=\"gg-color-picker\" value=\"";
        // line 1851
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "background_hover", array()), "html", null, true);
        echo "\" name=\"icons[background_hover]\"/>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<th scope=\"row\">
\t\t\t\t\t\t\t\t\t<label for=\"iconsSize\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1857
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Icons size")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t";
        // line 1858
        echo $context["form"]->getshow_tooltip("ci-icons-hover-size");
        echo "
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t<input type=\"number\" pattern=\"[0-9]\" id=\"iconsSize\"  name=\"icons[size]\" value=\"";
        // line 1862
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "size", array()), "html", null, true);
        echo "\"/>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<th scope=\"row\">
\t\t\t\t\t\t\t\t\t<label for=\"iconsMargin\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1868
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Distance between icons")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t";
        // line 1869
        echo $context["form"]->getshow_tooltip("ci-icons-distance");
        echo "
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t<input type=\"number\" pattern=\"[0-9]\" id=\"iconsMargin\"  name=\"icons[margin]\" value=\"";
        // line 1873
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "margin", array()), "html", null, true);
        echo "\"/>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<th scope=\"row\">
\t\t\t\t\t\t\t\t\t<label for=\"iconsOverlay\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1879
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Show overlay")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t";
        // line 1880
        echo $context["form"]->getshow_tooltip("ci-icons-show-overlay");
        echo "
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t<select id=\"iconsOverlay\" name=\"icons[overlay_enabled]\" style=\"width: auto;\">
\t\t\t\t\t\t\t\t\t\t<option value=\"true\" ";
        // line 1885
        echo $context["form"]->getselected($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "overlay_enabled", array()), "true");
        echo ">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 1886
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Yes")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"false\" ";
        // line 1888
        echo $context["form"]->getselected($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "overlay_enabled", array()), "false");
        echo ">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 1889
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("No")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t</option>
\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t<tr class=\"icons-overlay-toggle\">
\t\t\t\t\t\t\t\t<th scope=\"row\">
\t\t\t\t\t\t\t\t\t<label for=\"iconsOverlayColor\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1897
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Overlay color")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t";
        // line 1898
        echo $context["form"]->getshow_tooltip("ci-icons-overlay-color");
        echo "
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t<input type=\"text\" id=\"iconsOverlayColor\" class=\"gg-color-picker\" value=\"";
        // line 1902
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "overlay_color", array()), "html", null, true);
        echo "\" name=\"icons[overlay_color]\"/>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t<tr class=\"icons-overlay-toggle\">
\t\t\t\t\t\t\t\t<th scope=\"row\">
\t\t\t\t\t\t\t\t\t<label for=\"iconsOverlayTransparency\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1908
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Overlay transparency")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t";
        // line 1909
        echo $context["form"]->getshow_tooltip("ci-icons-overlay-transparency");
        echo "
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t</th>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t<select id=\"iconsOverlayTransparency\" name=\"icons[overlay_transparency]\" style=\"width: auto;\">
\t\t\t\t\t\t\t\t\t\t<option value=\"0\" ";
        // line 1914
        echo $context["form"]->getselected($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "overlay_transparency", array()), 0);
        echo ">0%</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"1\" ";
        // line 1915
        echo $context["form"]->getselected($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "overlay_transparency", array()), 1);
        echo ">10%</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"2\" ";
        // line 1916
        echo $context["form"]->getselected($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "overlay_transparency", array()), 2);
        echo ">20%</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"3\" ";
        // line 1917
        echo $context["form"]->getselected($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "overlay_transparency", array()), 3);
        echo ">30%</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"4\" ";
        // line 1918
        echo $context["form"]->getselected($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "overlay_transparency", array()), 4);
        echo ">40%</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"5\" ";
        // line 1919
        echo $context["form"]->getselected($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "overlay_transparency", array()), 5);
        if ( !$this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "overlay_transparency", array(), "any", true, true)) {
            echo "selected=\"selected\"";
        }
        echo ">50%</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"6\" ";
        // line 1920
        echo $context["form"]->getselected($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "overlay_transparency", array()), 6);
        echo ">60%</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"7\" ";
        // line 1921
        echo $context["form"]->getselected($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "overlay_transparency", array()), 7);
        echo ">70%</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"8\" ";
        // line 1922
        echo $context["form"]->getselected($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "overlay_transparency", array()), 8);
        echo ">80%</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"9\" ";
        // line 1923
        echo $context["form"]->getselected($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "overlay_transparency", array()), 9);
        echo ">90%</option>
\t\t\t\t\t\t\t\t\t\t<option value=\"10\" ";
        // line 1924
        echo $context["form"]->getselected($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "overlay_transparency", array()), 10);
        echo ">100%</option>
\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t";
        // line 1928
        echo $this->getAttribute($this, "showFewIconsBy", array(0 => ($context["settings"] ?? null), 1 => ($context["form"] ?? null), 2 => 0), "method");
        echo "
\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t</table>
\t\t\t\t\t\t<div class=\"separator\"></div>
\t\t\t\t\t";
    }

    // line 1935
    public function block_proCaptionAndIconSettings($context, array $blocks = array())
    {
        // line 1936
        echo "\t\t\t\t\t";
    }

    // line 1939
    public function block_exifCaptionSettings($context, array $blocks = array())
    {
        // line 1940
        echo "\t\t\t\t\t<table class=\"form-table\" name=\"captions\">
\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t<h1 style=\"line-height: 1;\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1945
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Show EXIF data")), "html", null, true);
        echo "
                                        ";
        // line 1946
        echo $context["form"]->getshow_tooltip("showExifDataPro");
        echo "</br>
\t\t\t\t\t\t\t\t\t\t<a class=\"button get-pro\" href=\"";
        // line 1947
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("?utm_source=plugin&utm_medium=exif-data&utm_campaign=gallery")), "html", null, true);
        echo "\" target=\"_blank\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 1948
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("GetPRO for 39\$")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</h1>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t</tbody>
\t\t\t\t\t</table>
\t\t\t\t\t";
    }

    // line 1960
    public function block_categories($context, array $blocks = array())
    {
        // line 1961
        echo "            <div data-tab=\"cats\">
                <h1 style=\"line-height: 1;\">
                    ";
        // line 1963
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Categories")), "html", null, true);
        echo "
                    ";
        // line 1964
        echo $context["form"]->getshow_tooltip("categoriesPro");
        echo "</br>
                    </br>
                    <a class=\"button get-pro\" target=\"_blank\"
                       href=\"";
        // line 1967
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("?utm_source=plugin&utm_medium=categories&utm_campaign=gallery")), "html", null, true);
        echo "\">Get PRO</a>
                </h1>

                <div>
                    <a href=\"";
        // line 1971
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("?utm_source=plugin&utm_medium=categories&utm_campaign=gallery")), "html", null, true);
        echo "\" target=\"_blank\">
                        <img style=\"max-width:600px;\" src=\"";
        // line 1972
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["environment"] ?? null), "getModule", array(0 => "core"), "method"), "getCdnUrl", array(), "method"), "html", null, true);
        echo "_assets/gallery/img/settings/categories.gif\" title=\"Available in PRO version\" />
                    </a>
                </div>
                ";
        // line 1975
        $this->displayBlock('pagination', $context, $blocks);
        // line 1991
        echo "            </div>
        ";
    }

    // line 1975
    public function block_pagination($context, array $blocks = array())
    {
        // line 1976
        echo "                    <h1 style=\"line-height: 1;\">
                        ";
        // line 1977
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Pagination")), "html", null, true);
        echo "
                        ";
        // line 1978
        echo $context["form"]->getshow_tooltip("paginationPro");
        echo "</br>
                        </br>
                        <a class=\"button get-pro\" target=\"_blank\"
                           href=\"";
        // line 1981
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("?utm_source=plugin&utm_medium=pages&utm_campaign=gallery")), "html", null, true);
        echo "\">Get PRO</a>
                    </h1>
                    <div name=\"pagination\">
                        <div>
                            <a href=\"";
        // line 1985
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("?utm_source=plugin&utm_medium=pages&utm_campaign=gallery")), "html", null, true);
        echo "\" target=\"_blank\">
                                <img style=\"max-width:600px;\" src=\"";
        // line 1986
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["environment"] ?? null), "getModule", array(0 => "core"), "method"), "getCdnUrl", array(), "method"), "html", null, true);
        echo "_assets/gallery/img/settings/pagination.gif\" title=\"Available in PRO version\" />
                            </a>
                        </div>
                    </div>
                ";
    }

    // line 1994
    public function block_watermark($context, array $blocks = array())
    {
        // line 1995
        echo "            <div data-tab=\"water-m-tab\">
                <h1 style=\"line-height: 1em;\">
                    <a class=\"button get-pro\" target=\"_blank\"
                       href=\"";
        // line 1998
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("?utm_source=plugin&utm_medium=watermarks&utm_campaign=gallery")), "html", null, true);
        echo "\">Get PRO for 39\$</a>
                </h1>
                <div>
                    <a href=\"";
        // line 2001
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("?utm_source=plugin&utm_medium=watermarks&utm_campaign=gallery")), "html", null, true);
        echo "\" target=\"_blank\">
                        <img src=\"";
        // line 2002
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["environment"] ?? null), "module", array(0 => "galleries"), "method"), "getLocationUrl", array(), "method"), "html", null, true);
        echo "/assets/img/water_m_pro-min.png\" />
                    </a>
                </div>
            </div>
        ";
    }

    // line 2008
    public function block_form($context, array $blocks = array())
    {
        // line 2009
        echo "        ";
    }

    // line 2139
    public function block_captionEffectInPro($context, array $blocks = array())
    {
        // line 2140
        echo "\t\t\t\t\t\t\t<figure class=\"grid-gallery-caption available-in-pro\" data-grid-gallery-type=\"";
        echo Twig_SupTwg_escape_filter($this->env, ($context["type"] ?? null), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t<a target=\"_blank\" href=\"";
        // line 2141
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('getProUrl')->getCallable(), array("?utm_source=plugin&utm_medium=caption-show-on-hover&utm_campaign=gallery")), "html", null, true);
        echo "\" class=\"caption-available-in-pro-link\">
\t\t\t\t\t\t\t\t\t<img data-src=\"holder.js/150x150?theme=industrial&text=";
        // line 2142
        echo Twig_SupTwg_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "\" class=\"dialog-image\">
\t\t\t\t\t\t\t\t\t<figcaption style=\"";
        // line 2143
        echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter(($context["figcaptionStyle"] ?? null)), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t\t\t<div class=\"grid-gallery-figcaption-wrap\" style=\"width:100%;height:100%;top:0;\">
\t\t\t\t\t\t\t\t\t\t\t<div style=\"display:table;width:100%;height:100%;\">
\t\t\t\t\t\t\t\t\t\t\t\t<span ";
        // line 2146
        if (($this->getAttribute(($context["settings"] ?? null), "rtl", array()) == true)) {
            echo "dir=\"rtl\" class=\"ggRtlClass\"";
        }
        echo " style=\"display:table-cell;font-size:";
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size", array()), "html", null, true);
        echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_replace_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size_unit", array()), array(0 => "px", 1 => "%", 2 => "em")), "html", null, true);
        echo ";padding:10px;vertical-align:";
        echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "position", array()), "html", null, true);
        echo ";\">Caption</span>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</figcaption>
\t\t\t\t\t\t\t\t\t<div class=\"get-in-pro-element\">
\t\t\t\t\t\t\t\t\t\t";
        // line 2151
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Pro Feature")), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</figure>
\t\t\t\t\t\t";
    }

    // line 2201
    public function block_iconsEffects($context, array $blocks = array())
    {
        // line 2202
        echo "\t\t\t\t\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = Twig_SupTwg_ensure_traversable(($context["iconsWithCaptionsEffects"] ?? null));
        foreach ($context['_seq'] as $context["type"] => $context["name"]) {
            // line 2203
            echo "\t\t\t\t\t\t\t\t<figure class=\"grid-gallery-caption\" data-type=\"icons\" data-grid-gallery-type=\"";
            echo Twig_SupTwg_escape_filter($this->env, $context["type"], "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t<img data-src=\"holder.js/150x150?theme=industrial&text=";
            // line 2204
            echo Twig_SupTwg_escape_filter($this->env, $context["name"], "html", null, true);
            echo "\" class=\"dialog-image\"/>
\t\t\t\t\t\t\t\t\t<figcaption style=\"";
            // line 2205
            echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_trim_filter(($context["figcaptionStyle"] ?? null)), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t<div class=\"hi-icon-wrap\" style=\"width: 48px; height: 48px; margin-top: 30%; position:relative;\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\" class=\"hi-icon icon-link\" style=\"border:1px solid #ccc; border-radius:50%;margin:auto;position:absolute;left:0;right:0;top: 0;bottom: 0;\">
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</figcaption>
\t\t\t\t\t\t\t\t\t<div class=\"caption-with-";
            // line 2211
            echo Twig_SupTwg_escape_filter($this->env, $context["type"], "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t<div style=\"display: table; height:100%; width:100%;\">
\t\t\t\t\t\t\t\t\t\t\t<span style=\"padding: 10px;display:table-cell;font-size:";
            // line 2213
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "text_size", array()), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t\t\tvertical-align:";
            // line 2214
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "thumbnail", array()), "overlay", array()), "position", array()), "html", null, true);
            echo ";\">
\t\t\t\t\t\t\t\t\t\t\t\tCaption
\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"select-element\">
\t\t\t\t\t\t\t\t\t\t";
            // line 2220
            echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select")), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</figure>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['name'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 2224
        echo "\t\t\t\t\t\t";
    }

    // line 2422
    public function block_modals($context, array $blocks = array())
    {
        // line 2423
        echo "        <div id=\"iconsPreview\" title=\"";
        echo Twig_SupTwg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Select icons effects")), "html", null, true);
        echo "\">
            ";
        // line 2425
        $context["iconsEffects"] = array("hi-icon-effect-1a" => array("padding" => "0", "bg" => "41ab6b"), "hi-icon-effect-1b" => array("padding" => "0", "bg" => "41ab6b"), "hi-icon-effect-2a" => array("padding" => "0", "bg" => "eea303"), "hi-icon-effect-2b" => array("padding" => "0", "bg" => "eea303"), "hi-icon-effect-3a" => array("padding" => "0", "bg" => "f06060"), "hi-icon-effect-3b" => array("padding" => "0", "bg" => "f06060"), "hi-icon-effect-5a" => array("padding" => "0", "bg" => "702fa8"), "hi-icon-effect-5b" => array("padding" => "0", "bg" => "702fa8"), "hi-icon-effect-5c" => array("padding" => "0", "bg" => "702fa8"), "hi-icon-effect-5d" => array("padding" => "0", "bg" => "702fa8"), "hi-icon-effect-7a" => array("padding" => "0", "bg" => "d54f30"), "hi-icon-effect-7b" => array("padding" => "0", "bg" => "d54f30"), "hi-icon-effect-9a" => array("padding" => "0", "bg" => "96a94b"), "hi-icon-effect-9b" => array("padding" => "0", "bg" => "96a94b"));
        // line 2442
        echo "            ";
        ob_start();
        // line 2443
        echo "                ";
        $this->displayBlock('icon_wrap_item_class', $context, $blocks);
        // line 2446
        echo "            ";
        $context["var_icon_wrap_item_class"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
        // line 2447
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = Twig_SupTwg_ensure_traversable(($context["iconsEffects"] ?? null));
        foreach ($context['_seq'] as $context["name"] => $context["p"]) {
            // line 2448
            echo "                <div class=\"hi-icon-wrap ";
            echo " ";
            echo "  ";
            echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_slice($this->env, $context["name"], 0, (($context["length"] ?? null) - 1)), "html", null, true);
            echo " ";
            echo " ";
            echo " ";
            echo Twig_SupTwg_escape_filter($this->env, $context["name"], "html", null, true);
            echo " ";
            echo " ";
            echo " holderjs\" style=\"display: inline-block; padding: ";
            echo Twig_SupTwg_escape_filter($this->env, $this->getAttribute($context["p"], "padding", array()), "html", null, true);
            echo "; width: 150px; height: 150px; background-color: #434A52; background-repeat: no-repeat; overflow: hidden;\">
                    <a href=\"#\" class=\"hi-icon ";
            // line 2449
            echo " ";
            echo " ";
            echo Twig_SupTwg_escape_filter($this->env, ($context["var_icon_wrap_item_class"] ?? null), "html", null, true);
            echo "\" data-effect=\"";
            echo Twig_SupTwg_escape_filter($this->env, $context["name"], "html", null, true);
            echo "\" data-effect-base=\"";
            echo Twig_SupTwg_escape_filter($this->env, Twig_SupTwg_slice($this->env, $context["name"], 0, (($context["length"] ?? null) - 1)), "html", null, true);
            echo "\" title=\"";
            echo Twig_SupTwg_escape_filter($this->env, ((call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Click on the icon to select effect")) . " ") . $context["name"]), "html", null, true);
            echo "\" style=\"\">Select</a>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 2452
        echo "        </div>
\t\t<style id=\"sggSettingsIconSizeStyle\">
\t\t\t.hi-icon {
\t\t\t\twidth: ";
        // line 2455
        echo Twig_SupTwg_escape_filter($this->env, ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "size", array()) * 2), "html", null, true);
        echo "px !important;
\t\t\t\theight: ";
        // line 2456
        echo Twig_SupTwg_escape_filter($this->env, ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "size", array()) * 2), "html", null, true);
        echo "px !important;
\t\t\t}
\t\t</style>
\t\t<style id=\"sggSettingsIconColorStyle\">
\t\t\t.hi-icon {color: ";
        // line 2460
        echo Twig_SupTwg_escape_filter($this->env, GridGallery_Galleries_Module::hexToRgbaStr($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "color", array()), (1 - ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "overlay_transparency", array()) / 10))), "html", null, true);
        echo " !important;}
\t\t</style>
\t\t<style id=\"sggSettingsIconBgColorStyle\">
\t\t\t.hi-icon { background: ";
        // line 2463
        echo Twig_SupTwg_escape_filter($this->env, GridGallery_Galleries_Module::hexToRgbaStr($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "background", array()), (1 - ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "bgTransparency", array()) / 10))), "html", null, true);
        echo " !important; }
\t\t</style>
\t\t<style id=\"sggSettingHiIconHoverColorStyle\">
\t\t\t.hi-icon:hover { color: ";
        // line 2466
        echo Twig_SupTwg_escape_filter($this->env, GridGallery_Galleries_Module::hexToRgbaStr($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "hover_color", array()), (1 - ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "overlay_transparency", array()) / 10))), "html", null, true);
        echo " !important; }
\t\t</style>
\t\t<style id=\"sggSettingHiIconHoverBgStyle\">
\t\t\t.hi-icon:hover { background: ";
        // line 2469
        echo Twig_SupTwg_escape_filter($this->env, GridGallery_Galleries_Module::hexToRgbaStr($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "background_hover", array()), (1 - ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "bgTransparency", array()) / 10))), "html", null, true);
        echo " !important; }
\t\t</style>
\t\t<style id=\"sggSettingHiIconBeforeFontSizeStyle\">
\t\t\t.hi-icon:before {
\t\t\t\tfont-size: ";
        // line 2473
        echo Twig_SupTwg_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "size", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "size", array()), 16)) : (16)), "html", null, true);
        echo "px !important;
\t\t\t\tline-height: ";
        // line 2474
        echo Twig_SupTwg_escape_filter($this->env, ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array()), "size", array()) * 2), "html", null, true);
        echo "px !important;
\t\t\t}
\t\t</style>
    ";
    }

    // line 2443
    public function block_icon_wrap_item_class($context, array $blocks = array())
    {
        echo "  
\t\t\t\t\ticon-fullscreen
                ";
    }

    // line 2479
    public function block_settingsOtherPro($context, array $blocks = array())
    {
        // line 2480
        echo "\t";
    }

    // line 2
    public function getlabel($__label__ = null, $__for__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "label" => $__label__,
            "for" => $__for__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 3
            echo "    <label for=\"";
            echo Twig_SupTwg_escape_filter($this->env, ($context["for"] ?? null), "html", null, true);
            echo "\">";
            echo Twig_SupTwg_escape_filter($this->env, ($context["label"] ?? null), "html", null, true);
            echo "</label>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
    }

    // line 2483
    public function getshowFewIconsBy($__settings__ = null, $__form__ = null, $__isCaptionBuilder__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "settings" => $__settings__,
            "form" => $__form__,
            "isCaptionBuilder" => $__isCaptionBuilder__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2484
            echo "
\t";
            // line 2485
            $context["isShowRow"] = 0;
            // line 2486
            echo "\t";
            if ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "captionBuilder", array()), "enabled", array()) == 1) && (($context["isCaptionBuilder"] ?? null) == 1))) {
                // line 2487
                echo "\t\t";
                $context["isShowRow"] = 1;
                // line 2488
                echo "\t";
            } elseif ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "captionBuilder", array()), "enabled", array()) != 1) && (($context["isCaptionBuilder"] ?? null) != 1))) {
                // line 2489
                echo "\t\t";
                $context["isShowRow"] = 1;
                // line 2490
                echo "\t";
            }
            // line 2491
            echo "    ";
            $context["showDownIcon"] = "";
            // line 2492
            echo "    ";
            if ((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "captionBuilder", array()), "enabled", array()) != 1) && (($context["isCaptionBuilder"] ?? null) != 1))) {
                // line 2493
                echo "        ";
                $context["showDownIcon"] = $this->getAttribute(($context["form"] ?? null), "show_tooltip", array(0 => "downloadIconPro"), "method");
                // line 2494
                echo "    ";
            }
            // line 2495
            echo "
\t";
            // line 2496
            if ((($context["isShowRow"] ?? null) == 1)) {
                // line 2497
                echo "\t\t";
                echo $this->getAttribute(                // line 2498
($context["form"] ?? null), "row", array(0 => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Show few icons by")), 1 => $this->getAttribute(                // line 2500
($context["form"] ?? null), "select", array(0 => "icons[showFewIcons]", 1 => array("default" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Default")), "params" => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("By params"))), 2 => (($this->getAttribute($this->getAttribute(                // line 2506
($context["settings"] ?? null), "icons", array(), "any", false, true), "showFewIcons", array(), "any", true, true)) ? (_Twig_SupTwg_default_filter($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "icons", array(), "any", false, true), "showFewIcons", array()), "default")) : ("default")), 3 => array("style" => "width: auto;", "id" => "showFewIconsSel")), "method"), 2 => "capt-showt-few-icons-by", 3 => "h4"), "method");
                // line 2512
                echo "
\t\t";
                // line 2513
                echo $this->getAttribute(                // line 2514
($context["form"] ?? null), "row", array(0 => "", 1 => (((((((($this->getAttribute(                // line 2516
($context["form"] ?? null), "checkbox", array(0 => "icons[isVideoIcon]", 1 => "1", 2 => Twig_SupTwg_array_merge(array("id" => "showVideoIconInp", "class" => "sggCheckboxInOneRow"), ((($this->getAttribute($this->getAttribute(                // line 2519
($context["settings"] ?? null), "icons", array()), "isVideoIcon", array()) == 1)) ? (array("checked" => "checked")) : (array())))), "method") . $this->getAttribute(                // line 2520
($context["form"] ?? null), "label", array(0 => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Show video icon, if exists")), 1 => "showVideoIconInp", 2 => array("class" => "sggCheckboxLabelInOneRow")), "method")) . $this->getAttribute(                // line 2525
($context["form"] ?? null), "checkbox", array(0 => "icons[isLinkIcon]", 1 => "1", 2 => Twig_SupTwg_array_merge(array("id" => "showLinkIconInp", "class" => "sggCheckboxInOneRow"), ((($this->getAttribute($this->getAttribute(                // line 2528
($context["settings"] ?? null), "icons", array()), "isLinkIcon", array()) == 1)) ? (array("checked" => "checked")) : (array())))), "method")) . $this->getAttribute(                // line 2529
($context["form"] ?? null), "label", array(0 => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Show link icon, if exists")), 1 => "showLinkIconInp", 2 => array("class" => "sggCheckboxLabelInOneRow")), "method")) . $this->getAttribute(                // line 2534
($context["form"] ?? null), "checkbox", array(0 => "icons[isPopupIcon]", 1 => "1", 2 => Twig_SupTwg_array_merge(array("id" => "showPopupIconInp", "class" => "sggCheckboxInOneRow"), ((($this->getAttribute($this->getAttribute(                // line 2537
($context["settings"] ?? null), "icons", array()), "isPopupIcon", array()) == 1)) ? (array("checked" => "checked")) : (array())))), "method")) . $this->getAttribute(                // line 2538
($context["form"] ?? null), "label", array(0 => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Show popup")), 1 => "showPopupIconInp", 2 => array("class" => "sggCheckboxLabelInOneRow")), "method")) . $this->getAttribute(                // line 2543
($context["form"] ?? null), "checkbox", array(0 => "icons[isDownloadIcon]", 1 => "1", 2 => Twig_SupTwg_array_merge(Twig_SupTwg_array_merge(array("id" => "showDownloadIconInp", "class" => "sggCheckboxInOneRow"), (((($this->getAttribute($this->getAttribute(                // line 2546
($context["settings"] ?? null), "icons", array()), "isDownloadIcon", array()) == 1) && ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "captionBuilder", array()), "enabled", array()) == 1))) ? (array("checked" => "checked")) : (array()))), (((($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "captionBuilder", array()), "enabled", array()) != 1) && (($context["isCaptionBuilder"] ?? null) != 1))) ? (array("data-disabled" => "disabled")) : (array())))), "method")) . $this->getAttribute(                // line 2547
($context["form"] ?? null), "label", array(0 => call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Show download")), 1 => "showDownloadIconInp", 2 => array("class" => "sggCheckboxLabelInOneRow")), "method")) .                 // line 2551
($context["showDownIcon"] ?? null)), 2 => "capt-showv-few-icons-by", 3 => null, 4 => "sggFewIconsShowingRow"), "method");
                // line 2556
                echo "
\t";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_SupTwg_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "@galleries/settings.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  3876 => 2556,  3874 => 2551,  3873 => 2547,  3872 => 2546,  3871 => 2543,  3870 => 2538,  3869 => 2537,  3868 => 2534,  3867 => 2529,  3866 => 2528,  3865 => 2525,  3864 => 2520,  3863 => 2519,  3862 => 2516,  3861 => 2514,  3860 => 2513,  3857 => 2512,  3855 => 2506,  3854 => 2500,  3853 => 2498,  3851 => 2497,  3849 => 2496,  3846 => 2495,  3843 => 2494,  3840 => 2493,  3837 => 2492,  3834 => 2491,  3831 => 2490,  3828 => 2489,  3825 => 2488,  3822 => 2487,  3819 => 2486,  3817 => 2485,  3814 => 2484,  3800 => 2483,  3780 => 3,  3767 => 2,  3763 => 2480,  3760 => 2479,  3752 => 2443,  3744 => 2474,  3740 => 2473,  3733 => 2469,  3727 => 2466,  3721 => 2463,  3715 => 2460,  3708 => 2456,  3704 => 2455,  3699 => 2452,  3682 => 2449,  3667 => 2448,  3662 => 2447,  3659 => 2446,  3656 => 2443,  3653 => 2442,  3651 => 2425,  3646 => 2423,  3643 => 2422,  3639 => 2224,  3629 => 2220,  3620 => 2214,  3616 => 2213,  3611 => 2211,  3602 => 2205,  3598 => 2204,  3593 => 2203,  3588 => 2202,  3585 => 2201,  3576 => 2151,  3561 => 2146,  3555 => 2143,  3551 => 2142,  3547 => 2141,  3542 => 2140,  3539 => 2139,  3535 => 2009,  3532 => 2008,  3523 => 2002,  3519 => 2001,  3513 => 1998,  3508 => 1995,  3505 => 1994,  3496 => 1986,  3492 => 1985,  3485 => 1981,  3479 => 1978,  3475 => 1977,  3472 => 1976,  3469 => 1975,  3464 => 1991,  3462 => 1975,  3456 => 1972,  3452 => 1971,  3445 => 1967,  3439 => 1964,  3435 => 1963,  3431 => 1961,  3428 => 1960,  3416 => 1948,  3412 => 1947,  3408 => 1946,  3404 => 1945,  3397 => 1940,  3394 => 1939,  3390 => 1936,  3387 => 1935,  3378 => 1928,  3371 => 1924,  3367 => 1923,  3363 => 1922,  3359 => 1921,  3355 => 1920,  3348 => 1919,  3344 => 1918,  3340 => 1917,  3336 => 1916,  3332 => 1915,  3328 => 1914,  3320 => 1909,  3316 => 1908,  3307 => 1902,  3300 => 1898,  3296 => 1897,  3285 => 1889,  3281 => 1888,  3276 => 1886,  3272 => 1885,  3264 => 1880,  3260 => 1879,  3251 => 1873,  3244 => 1869,  3240 => 1868,  3231 => 1862,  3224 => 1858,  3220 => 1857,  3211 => 1851,  3204 => 1847,  3200 => 1846,  3191 => 1840,  3184 => 1836,  3180 => 1835,  3171 => 1829,  3164 => 1825,  3160 => 1824,  3151 => 1818,  3144 => 1814,  3140 => 1813,  3134 => 1809,  3132 => 1807,  3131 => 1806,  3126 => 1803,  3124 => 1802,  3123 => 1801,  3122 => 1800,  3121 => 1799,  3119 => 1798,  3117 => 1797,  3113 => 1795,  3110 => 1794,  3105 => 1615,  3103 => 1608,  3101 => 1605,  3098 => 1604,  3093 => 1600,  3091 => 1591,  3089 => 1588,  3086 => 1587,  3077 => 1787,  3075 => 1784,  3074 => 1781,  3072 => 1780,  3068 => 1777,  3066 => 1774,  3065 => 1771,  3063 => 1770,  3059 => 1767,  3057 => 1763,  3056 => 1760,  3054 => 1759,  3049 => 1755,  3047 => 1751,  3046 => 1750,  3045 => 1748,  3043 => 1747,  3039 => 1744,  3037 => 1740,  3036 => 1737,  3034 => 1736,  3030 => 1733,  3028 => 1729,  3027 => 1726,  3025 => 1725,  3021 => 1722,  3019 => 1718,  3018 => 1715,  3017 => 1712,  3016 => 1709,  3014 => 1708,  3010 => 1705,  3008 => 1701,  3007 => 1698,  3005 => 1697,  3001 => 1694,  2999 => 1690,  2998 => 1688,  2996 => 1687,  2992 => 1684,  2990 => 1680,  2989 => 1678,  2987 => 1677,  2983 => 1674,  2981 => 1668,  2980 => 1665,  2978 => 1664,  2974 => 1661,  2972 => 1657,  2971 => 1654,  2969 => 1653,  2965 => 1650,  2963 => 1646,  2962 => 1643,  2960 => 1642,  2956 => 1639,  2954 => 1634,  2953 => 1631,  2951 => 1630,  2947 => 1627,  2945 => 1623,  2944 => 1620,  2942 => 1619,  2939 => 1617,  2936 => 1604,  2933 => 1602,  2930 => 1587,  2926 => 1584,  2924 => 1578,  2922 => 1577,  2918 => 1574,  2916 => 1569,  2915 => 1567,  2914 => 1564,  2913 => 1560,  2912 => 1558,  2911 => 1555,  2909 => 1554,  2905 => 1551,  2902 => 1550,  2895 => 1535,  2893 => 1529,  2892 => 1524,  2891 => 1520,  2890 => 1515,  2889 => 1512,  2885 => 1510,  2882 => 1509,  2873 => 1455,  2869 => 1454,  2861 => 1449,  2855 => 1446,  2851 => 1445,  2847 => 1443,  2844 => 1442,  2837 => 1431,  2835 => 1425,  2834 => 1420,  2833 => 1416,  2832 => 1411,  2831 => 1408,  2827 => 1406,  2824 => 1405,  2817 => 1400,  2815 => 1399,  2814 => 1398,  2813 => 1397,  2812 => 1396,  2811 => 1393,  2807 => 1391,  2804 => 1390,  2799 => 1387,  2791 => 1382,  2787 => 1381,  2780 => 1377,  2775 => 1375,  2771 => 1374,  2765 => 1370,  2755 => 1360,  2749 => 1357,  2742 => 1353,  2737 => 1351,  2731 => 1347,  2729 => 1346,  2724 => 1344,  2723 => 1343,  2722 => 1342,  2721 => 1341,  2719 => 1340,  2717 => 1339,  2713 => 1337,  2710 => 1336,  2702 => 1331,  2698 => 1330,  2695 => 1329,  2693 => 1327,  2692 => 1318,  2691 => 1316,  2688 => 1315,  2686 => 1313,  2685 => 1306,  2684 => 1304,  2681 => 1303,  2679 => 1300,  2678 => 1297,  2677 => 1295,  2671 => 1292,  2670 => 1291,  2669 => 1290,  2668 => 1289,  2666 => 1288,  2662 => 1285,  2659 => 1284,  2653 => 1271,  2651 => 1266,  2650 => 1263,  2644 => 1259,  2642 => 1254,  2641 => 1251,  2637 => 1249,  2635 => 1244,  2634 => 1241,  2630 => 1239,  2628 => 1236,  2627 => 1229,  2625 => 1226,  2621 => 1223,  2619 => 1220,  2618 => 1217,  2616 => 1214,  2612 => 1211,  2610 => 1210,  2609 => 1207,  2608 => 1205,  2607 => 1204,  2606 => 1201,  2605 => 1199,  2603 => 1196,  2601 => 1195,  2598 => 1194,  2591 => 1050,  2589 => 1046,  2582 => 1042,  2577 => 1040,  2573 => 1039,  2568 => 1036,  2565 => 1035,  2558 => 1029,  2556 => 1025,  2549 => 1021,  2544 => 1019,  2540 => 1018,  2535 => 1015,  2532 => 1014,  2525 => 1008,  2523 => 998,  2516 => 994,  2511 => 992,  2507 => 991,  2502 => 988,  2499 => 987,  2493 => 1280,  2491 => 1278,  2490 => 1276,  2486 => 1274,  2483 => 1194,  2479 => 1191,  2477 => 1188,  2476 => 1185,  2474 => 1183,  2470 => 1180,  2468 => 1177,  2467 => 1174,  2465 => 1172,  2460 => 1168,  2458 => 1166,  2457 => 1163,  2456 => 1160,  2455 => 1159,  2454 => 1156,  2453 => 1153,  2451 => 1152,  2447 => 1149,  2445 => 1145,  2444 => 1142,  2442 => 1141,  2438 => 1138,  2436 => 1133,  2435 => 1130,  2433 => 1129,  2429 => 1126,  2427 => 1122,  2426 => 1119,  2424 => 1118,  2420 => 1115,  2418 => 1110,  2417 => 1107,  2415 => 1106,  2411 => 1103,  2409 => 1100,  2408 => 1085,  2406 => 1084,  2402 => 1081,  2400 => 1077,  2399 => 1075,  2397 => 1074,  2393 => 1071,  2391 => 1069,  2390 => 1066,  2389 => 1065,  2385 => 1063,  2383 => 1060,  2382 => 1057,  2380 => 1056,  2377 => 1054,  2374 => 1035,  2371 => 1033,  2368 => 1014,  2365 => 1012,  2362 => 987,  2358 => 984,  2356 => 981,  2355 => 973,  2353 => 972,  2349 => 969,  2347 => 966,  2346 => 963,  2344 => 962,  2339 => 959,  2338 => 958,  2337 => 957,  2332 => 955,  2331 => 954,  2327 => 952,  2325 => 951,  2324 => 950,  2320 => 948,  2318 => 945,  2317 => 942,  2315 => 941,  2311 => 938,  2309 => 935,  2308 => 933,  2307 => 931,  2306 => 929,  2305 => 924,  2303 => 923,  2298 => 919,  2296 => 915,  2295 => 913,  2294 => 910,  2293 => 906,  2292 => 904,  2291 => 901,  2289 => 900,  2286 => 899,  2282 => 896,  2279 => 895,  2270 => 889,  2269 => 888,  2264 => 886,  2263 => 885,  2258 => 883,  2257 => 882,  2252 => 880,  2251 => 879,  2246 => 877,  2245 => 876,  2236 => 870,  2230 => 869,  2225 => 867,  2219 => 866,  2214 => 864,  2208 => 863,  2201 => 859,  2197 => 858,  2187 => 851,  2180 => 847,  2176 => 846,  2166 => 839,  2160 => 838,  2156 => 837,  2150 => 836,  2143 => 832,  2139 => 831,  2132 => 826,  2129 => 825,  2120 => 819,  2119 => 818,  2118 => 817,  2113 => 815,  2112 => 814,  2107 => 812,  2106 => 811,  2105 => 810,  2102 => 809,  2098 => 792,  2095 => 791,  2091 => 785,  2088 => 784,  2081 => 786,  2079 => 784,  2075 => 782,  2073 => 778,  2072 => 773,  2071 => 772,  2067 => 770,  2065 => 766,  2064 => 764,  2063 => 763,  2059 => 761,  2057 => 757,  2056 => 755,  2055 => 754,  2051 => 752,  2049 => 751,  2048 => 737,  2047 => 736,  2042 => 734,  2041 => 733,  2035 => 730,  2034 => 729,  2033 => 728,  2032 => 727,  2030 => 726,  2028 => 725,  2024 => 723,  2021 => 722,  2014 => 693,  2006 => 688,  2002 => 687,  1998 => 686,  1993 => 684,  1989 => 682,  1986 => 681,  1979 => 677,  1975 => 676,  1969 => 673,  1965 => 671,  1960 => 668,  1958 => 666,  1957 => 660,  1956 => 659,  1952 => 657,  1950 => 655,  1949 => 649,  1948 => 648,  1944 => 646,  1942 => 644,  1941 => 637,  1940 => 636,  1936 => 634,  1934 => 630,  1933 => 627,  1931 => 626,  1929 => 625,  1924 => 623,  1923 => 622,  1919 => 620,  1917 => 618,  1916 => 612,  1915 => 611,  1911 => 609,  1909 => 607,  1908 => 601,  1907 => 600,  1903 => 598,  1901 => 596,  1900 => 589,  1899 => 588,  1895 => 586,  1893 => 582,  1892 => 579,  1890 => 578,  1888 => 577,  1883 => 575,  1882 => 574,  1878 => 572,  1876 => 570,  1875 => 564,  1874 => 563,  1870 => 561,  1868 => 557,  1867 => 554,  1866 => 553,  1861 => 550,  1859 => 549,  1857 => 548,  1853 => 545,  1851 => 543,  1850 => 542,  1849 => 541,  1848 => 540,  1844 => 538,  1841 => 537,  1839 => 536,  1833 => 533,  1832 => 532,  1831 => 531,  1830 => 530,  1829 => 529,  1825 => 527,  1822 => 526,  1818 => 524,  1815 => 523,  1811 => 521,  1808 => 520,  1804 => 502,  1801 => 501,  1795 => 488,  1793 => 486,  1791 => 483,  1788 => 482,  1783 => 479,  1781 => 477,  1779 => 474,  1776 => 473,  1771 => 361,  1769 => 357,  1768 => 356,  1767 => 354,  1766 => 353,  1763 => 352,  1760 => 345,  1757 => 344,  1746 => 511,  1744 => 508,  1743 => 505,  1742 => 504,  1739 => 503,  1737 => 501,  1733 => 499,  1731 => 496,  1730 => 493,  1729 => 492,  1726 => 491,  1724 => 482,  1721 => 481,  1719 => 473,  1715 => 471,  1713 => 466,  1712 => 463,  1711 => 462,  1707 => 460,  1705 => 457,  1704 => 456,  1703 => 454,  1701 => 453,  1698 => 441,  1693 => 438,  1692 => 437,  1691 => 436,  1686 => 434,  1685 => 433,  1684 => 432,  1678 => 429,  1677 => 428,  1676 => 427,  1673 => 426,  1668 => 419,  1667 => 418,  1663 => 416,  1661 => 413,  1660 => 410,  1658 => 409,  1653 => 406,  1652 => 405,  1651 => 404,  1646 => 402,  1645 => 401,  1644 => 400,  1638 => 397,  1637 => 396,  1633 => 394,  1631 => 393,  1630 => 392,  1627 => 391,  1622 => 387,  1621 => 386,  1620 => 385,  1619 => 383,  1618 => 382,  1617 => 380,  1616 => 379,  1615 => 378,  1608 => 374,  1599 => 368,  1595 => 367,  1589 => 363,  1587 => 344,  1583 => 342,  1580 => 341,  1575 => 338,  1571 => 2479,  1568 => 2478,  1566 => 2422,  1556 => 2415,  1551 => 2413,  1544 => 2409,  1540 => 2408,  1536 => 2407,  1530 => 2404,  1525 => 2403,  1523 => 2402,  1514 => 2395,  1512 => 2389,  1511 => 2388,  1505 => 2385,  1498 => 2380,  1496 => 2376,  1495 => 2371,  1494 => 2367,  1493 => 2362,  1492 => 2361,  1486 => 2358,  1477 => 2354,  1470 => 2350,  1464 => 2347,  1457 => 2343,  1432 => 2320,  1422 => 2316,  1416 => 2313,  1406 => 2312,  1396 => 2311,  1393 => 2310,  1389 => 2309,  1385 => 2307,  1383 => 2235,  1377 => 2232,  1372 => 2230,  1367 => 2227,  1363 => 2225,  1361 => 2201,  1355 => 2199,  1353 => 2198,  1350 => 2197,  1336 => 2196,  1329 => 2192,  1314 => 2187,  1308 => 2184,  1304 => 2183,  1299 => 2182,  1292 => 2178,  1279 => 2172,  1274 => 2170,  1269 => 2168,  1254 => 2157,  1251 => 2156,  1248 => 2139,  1246 => 2138,  1240 => 2135,  1234 => 2132,  1222 => 2124,  1219 => 2123,  1202 => 2122,  1197 => 2120,  1191 => 2116,  1181 => 2112,  1175 => 2109,  1170 => 2107,  1164 => 2106,  1158 => 2105,  1151 => 2104,  1147 => 2103,  1144 => 2102,  1141 => 2101,  1138 => 2100,  1136 => 2099,  1133 => 2098,  1131 => 2089,  1126 => 2086,  1124 => 2081,  1123 => 2079,  1122 => 2076,  1121 => 2072,  1120 => 2070,  1119 => 2067,  1118 => 2063,  1117 => 2061,  1116 => 2058,  1115 => 2057,  1110 => 2056,  1108 => 2055,  1102 => 2052,  1097 => 2050,  1089 => 2045,  1082 => 2041,  1072 => 2034,  1067 => 2032,  1061 => 2029,  1056 => 2027,  1051 => 2025,  1044 => 2021,  1040 => 2020,  1033 => 2016,  1027 => 2013,  1022 => 2011,  1019 => 2010,  1017 => 2008,  1014 => 2007,  1012 => 1994,  1009 => 1993,  1007 => 1960,  1001 => 1956,  999 => 1939,  995 => 1937,  993 => 1935,  989 => 1933,  987 => 1794,  984 => 1793,  982 => 1550,  976 => 1546,  974 => 1545,  973 => 1544,  970 => 1543,  968 => 1541,  966 => 1539,  964 => 1509,  961 => 1508,  958 => 1507,  955 => 1506,  952 => 1499,  949 => 1463,  945 => 1460,  943 => 1442,  938 => 1439,  936 => 1437,  934 => 1435,  932 => 1405,  929 => 1404,  927 => 1390,  924 => 1389,  922 => 1336,  919 => 1335,  917 => 1284,  914 => 1283,  912 => 895,  909 => 894,  907 => 825,  904 => 824,  902 => 791,  899 => 790,  897 => 722,  888 => 716,  887 => 715,  875 => 706,  871 => 705,  863 => 702,  858 => 700,  853 => 697,  851 => 526,  848 => 525,  846 => 523,  843 => 522,  841 => 520,  838 => 519,  836 => 341,  832 => 339,  830 => 338,  826 => 337,  822 => 336,  818 => 335,  814 => 334,  810 => 333,  806 => 332,  802 => 331,  797 => 329,  793 => 328,  789 => 327,  785 => 326,  781 => 325,  777 => 324,  773 => 323,  769 => 322,  765 => 321,  761 => 320,  757 => 319,  753 => 318,  749 => 317,  745 => 315,  742 => 314,  739 => 313,  736 => 312,  729 => 215,  726 => 214,  721 => 199,  717 => 197,  711 => 195,  708 => 194,  704 => 192,  698 => 190,  696 => 189,  687 => 186,  681 => 184,  675 => 182,  672 => 181,  669 => 180,  665 => 156,  661 => 154,  659 => 153,  656 => 152,  653 => 151,  649 => 85,  646 => 84,  639 => 307,  637 => 299,  633 => 298,  627 => 295,  623 => 294,  619 => 293,  615 => 292,  611 => 291,  607 => 290,  603 => 289,  599 => 288,  595 => 287,  591 => 286,  587 => 285,  583 => 283,  577 => 280,  573 => 279,  569 => 278,  565 => 277,  558 => 273,  552 => 270,  548 => 268,  541 => 264,  535 => 263,  530 => 261,  524 => 260,  519 => 259,  517 => 258,  513 => 257,  506 => 253,  501 => 251,  497 => 250,  491 => 247,  486 => 245,  474 => 236,  470 => 235,  466 => 234,  461 => 232,  455 => 231,  451 => 230,  445 => 226,  438 => 222,  434 => 220,  429 => 217,  427 => 214,  424 => 213,  419 => 211,  414 => 209,  406 => 206,  399 => 203,  397 => 202,  394 => 201,  392 => 180,  389 => 179,  386 => 178,  383 => 177,  380 => 176,  377 => 175,  375 => 174,  372 => 173,  369 => 172,  366 => 171,  363 => 170,  360 => 169,  358 => 168,  355 => 167,  352 => 166,  349 => 165,  347 => 164,  344 => 163,  341 => 162,  338 => 161,  336 => 160,  333 => 159,  331 => 158,  328 => 157,  326 => 151,  319 => 146,  313 => 144,  311 => 143,  308 => 142,  306 => 141,  298 => 136,  288 => 129,  283 => 127,  274 => 121,  269 => 119,  265 => 118,  262 => 117,  256 => 106,  250 => 103,  246 => 102,  242 => 101,  233 => 100,  230 => 99,  225 => 97,  220 => 96,  217 => 95,  214 => 94,  212 => 93,  201 => 91,  197 => 89,  194 => 88,  192 => 87,  189 => 86,  186 => 84,  184 => 83,  181 => 82,  178 => 81,  175 => 80,  172 => 79,  166 => 77,  163 => 76,  160 => 75,  157 => 74,  152 => 70,  147 => 71,  145 => 70,  140 => 68,  132 => 63,  124 => 58,  116 => 53,  108 => 48,  97 => 42,  89 => 40,  87 => 39,  85 => 38,  82 => 19,  80 => 18,  77 => 17,  73 => 1,  71 => 5,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_SupTwg_Source("", "@galleries/settings.twig", "/www/wwwroot/www.lovemv.tv/wp-content/plugins/gallery-by-supsystic/src/GridGallery/Galleries/views/settings.twig");
    }
}
