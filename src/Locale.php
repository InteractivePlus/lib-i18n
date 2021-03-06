<?php
namespace InteractivePlus\LibI18N;

use COM;

class Locale{
    public static function isValidLocale(string $locale) : bool{
        $foundLocale = false;
        foreach(self::allLocales as $singleLocale){
            if(self::isLeftLocaleClose($locale,$singleLocale)){
                $foundLocale = true;
            break;
            }
        }
        return $foundLocale;
    }
    public static function fixLocale(string $locale, string $defaultLocale) : string{
        if(!self::isValidLocale($locale)){
            //try to find an optimal local
            return self::getBestFitLocale($locale,$defaultLocale);
        }else{
            return $locale;
        }
    }
    public static function getBestFitLocale(string $locale, string $default) : string{
        $optimalLocal = $default;
        $optimalLocalFitNum = 0;
        $parsedLocale = locale_parse($locale);
        if(empty($parsedLocale)){
            return self::LOCALE_en_US;
        }
        $compareKeys = ['language', 'script', 'region'];
        foreach(self::allLocales as $singleLocale){
            $parsedSingleLocale = locale_parse($singleLocale);
            $currentFitNum = 0;
            foreach($compareKeys as $singleKey){
                if($parsedLocale[$singleKey] === $parsedSingleLocale[$singleKey]){
                    $currentFitNum++;
                }
            }
            if($currentFitNum > $optimalLocalFitNum){
                $optimalLocal = $singleLocale;
                $optimalLocalFitNum = $currentFitNum;
            }
        }
        return $optimalLocal;
    }
    public static function getBestFitLocaleInLocaleArr(string $locale, string $default, array $localeArr) : string{
        $optimalLocal = $default;
        $optimalLocalFitNum = 0;
        $parsedLocale = locale_parse($locale);
        if(empty($parsedLocale)){
            return self::LOCALE_en_US;
        }
        $compareKeys = ['language', 'script', 'region'];
        foreach($localeArr as $singleLocale){
            $parsedSingleLocale = locale_parse($singleLocale);
            $currentFitNum = 0;
            foreach($compareKeys as $singleKey){
                if($parsedLocale[$singleKey] === $parsedSingleLocale[$singleKey]){
                    $currentFitNum++;
                }
            }
            if($currentFitNum > $optimalLocalFitNum){
                $optimalLocal = $singleLocale;
                $optimalLocalFitNum = $currentFitNum;
            }
        }
        return $optimalLocal;
    }
    public static function isLocaleCloseEnough(string $left, string $right) : bool{
        $parsedLeft = locale_parse($left);
        $parsedRight = locale_parse($right);
        $compareKeys = ['language', 'script', 'region'];
        if(empty($parsedLeft) || empty($parsedRight)){
            return false;
        }
        foreach($compareKeys as $singleKey){
            if(!Comparison::bothEqualOrEmpty($parsedLeft[$singleKey],$parsedRight[$singleKey])){
                return false;
            }
        }
        return true;
    }
    public static function isLeftLocaleClose(string $left, string $right) : bool{
        $parsedLeft = locale_parse($left);
        $parsedRight = locale_parse($right);
        $compareKeys = ['language', 'script', 'region'];
        if(empty($parsedLeft) || empty($parsedRight)){
            return false;
        }
        foreach($compareKeys as $singleKey){
            if(!Comparison::leftEqualOrEmpty($parsedLeft[$singleKey],$parsedRight[$singleKey])){
                return false;
            }
        }
        return true;
    }
    public static function isRightLocaleClose(string $left, string $right) : bool{
        return self::isLeftLocaleClose($right,$left);
    }
    public static function getDisplayName(string $locale, string $in_Locale = 'en-US') : string{
        return locale_get_display_name($locale,$in_Locale);
    }
    public static function getLanguageDisplayName(string $locale, string $in_Locale = 'en_US') : string{
        return locale_get_display_language($locale,$in_Locale);
    }
    public static function getRegion(string $locale) : string{
        return locale_get_region($locale);
    }
    //This variable is generated from ResourceBundle::getLocales('') method on PHP 7.4 with Intl extension enabled
    const allLocales = array(
        'af', 'af_NA', 'af_ZA', 'agq', 'agq_CM', 'ak', 'ak_GH', 'am', 'am_ET', 'ar', 'ar_001', 'ar_AE', 'ar_BH', 'ar_DJ', 'ar_DZ', 'ar_EG', 'ar_EH', 'ar_ER', 'ar_IL', 'ar_IQ', 'ar_JO', 'ar_KM', 'ar_KW', 'ar_LB', 'ar_LY', 'ar_MA', 'ar_MR', 'ar_OM', 'ar_PS', 'ar_QA', 'ar_SA', 'ar_SD', 'ar_SO', 'ar_SS', 'ar_SY', 'ar_TD', 'ar_TN', 'ar_YE', 'as', 'as_IN', 'asa', 'asa_TZ', 'ast', 'ast_ES', 'az', 'az_Cyrl', 'az_Cyrl_AZ', 'az_Latn', 'az_Latn_AZ', 'bas', 'bas_CM', 'be', 'be_BY', 'bem', 'bem_ZM', 'bez', 'bez_TZ', 'bg', 'bg_BG', 'bm', 'bm_ML', 'bn', 'bn_BD', 'bn_IN', 'bo', 'bo_CN', 'bo_IN', 'br', 'br_FR', 'brx', 'brx_IN', 'bs', 'bs_Cyrl', 'bs_Cyrl_BA', 'bs_Latn', 'bs_Latn_BA', 'ca', 'ca_AD', 'ca_ES', 'ca_FR', 'ca_IT', 'ccp', 'ccp_BD', 'ccp_IN', 'ce', 'ce_RU', 'ceb', 'ceb_PH', 'cgg', 'cgg_UG', 'chr', 'chr_US', 'ckb', 'ckb_IQ', 'ckb_IR', 'cs', 'cs_CZ', 'cy', 'cy_GB', 'da', 'da_DK', 'da_GL', 'dav', 'dav_KE', 'de', 'de_AT', 'de_BE', 'de_CH', 'de_DE', 'de_IT', 'de_LI', 'de_LU', 'dje', 'dje_NE', 'dsb', 'dsb_DE', 'dua', 'dua_CM', 'dyo', 'dyo_SN', 'dz', 'dz_BT', 'ebu', 'ebu_KE', 'ee', 'ee_GH', 'ee_TG', 'el', 'el_CY', 'el_GR', 'en', 'en_001', 'en_150', 'en_AE', 'en_AG', 'en_AI', 'en_AS', 'en_AT', 'en_AU', 'en_BB', 'en_BE', 'en_BI', 'en_BM', 'en_BS', 'en_BW', 'en_BZ', 'en_CA', 'en_CC', 'en_CH', 'en_CK', 'en_CM', 'en_CX', 'en_CY', 'en_DE', 'en_DG', 'en_DK', 'en_DM', 'en_ER', 'en_FI', 'en_FJ', 'en_FK', 'en_FM', 'en_GB', 'en_GD', 'en_GG', 'en_GH', 'en_GI', 'en_GM', 'en_GU', 'en_GY', 'en_HK', 'en_IE', 'en_IL', 'en_IM', 'en_IN', 'en_IO', 'en_JE', 'en_JM', 'en_KE', 'en_KI', 'en_KN', 'en_KY', 'en_LC', 'en_LR', 'en_LS', 'en_MG', 'en_MH', 'en_MO', 'en_MP', 'en_MS', 'en_MT', 'en_MU', 'en_MW', 'en_MY', 'en_NA', 'en_NF', 'en_NG', 'en_NL', 'en_NR', 'en_NU', 'en_NZ', 'en_PG', 'en_PH', 'en_PK', 'en_PN', 'en_PR', 'en_PW', 'en_RW', 'en_SB', 'en_SC', 'en_SD', 'en_SE', 'en_SG', 'en_SH', 'en_SI', 'en_SL', 'en_SS', 'en_SX', 'en_SZ', 'en_TC', 'en_TK', 'en_TO', 'en_TT', 'en_TV', 'en_TZ', 'en_UG', 'en_UM', 'en_US', 'en_US_POSIX', 'en_VC', 'en_VG', 'en_VI', 'en_VU', 'en_WS', 'en_ZA', 'en_ZM', 'en_ZW', 'eo', 'eo_001', 'es', 'es_419', 'es_AR', 'es_BO', 'es_BR', 'es_BZ', 'es_CL', 'es_CO', 'es_CR', 'es_CU', 'es_DO', 'es_EA', 'es_EC', 'es_ES', 'es_GQ', 'es_GT', 'es_HN', 'es_IC', 'es_MX', 'es_NI', 'es_PA', 'es_PE', 'es_PH', 'es_PR', 'es_PY', 'es_SV', 'es_US', 'es_UY', 'es_VE', 'et', 'et_EE', 'eu', 'eu_ES', 'ewo', 'ewo_CM', 'fa', 'fa_AF', 'fa_IR', 'ff', 'ff_Latn', 'ff_Latn_BF', 'ff_Latn_CM', 'ff_Latn_GH', 'ff_Latn_GM', 'ff_Latn_GN', 'ff_Latn_GW', 'ff_Latn_LR', 'ff_Latn_MR', 'ff_Latn_NE', 'ff_Latn_NG', 'ff_Latn_SL', 'ff_Latn_SN', 'fi', 'fi_FI', 'fil', 'fil_PH', 'fo', 'fo_DK', 'fo_FO', 'fr', 'fr_BE', 'fr_BF', 'fr_BI', 'fr_BJ', 'fr_BL', 'fr_CA', 'fr_CD', 'fr_CF', 'fr_CG', 'fr_CH', 'fr_CI', 'fr_CM', 'fr_DJ', 'fr_DZ', 'fr_FR', 'fr_GA', 'fr_GF', 'fr_GN', 'fr_GP', 'fr_GQ', 'fr_HT', 'fr_KM', 'fr_LU', 'fr_MA', 'fr_MC', 'fr_MF', 'fr_MG', 'fr_ML', 'fr_MQ', 'fr_MR', 'fr_MU', 'fr_NC', 'fr_NE', 'fr_PF', 'fr_PM', 'fr_RE', 'fr_RW', 'fr_SC', 'fr_SN', 'fr_SY', 'fr_TD', 'fr_TG', 'fr_TN', 'fr_VU', 'fr_WF', 'fr_YT', 'fur', 'fur_IT', 'fy', 'fy_NL', 'ga', 'ga_GB', 'ga_IE', 'gd', 'gd_GB', 'gl', 'gl_ES', 'gsw', 'gsw_CH', 'gsw_FR', 'gsw_LI', 'gu', 'gu_IN', 'guz', 'guz_KE', 'gv', 'gv_IM', 'ha', 'ha_GH', 'ha_NE', 'ha_NG', 'haw', 'haw_US', 'he', 'he_IL', 'hi', 'hi_IN', 'hr', 'hr_BA', 'hr_HR', 'hsb', 'hsb_DE', 'hu', 'hu_HU', 'hy', 'hy_AM', 'ia', 'ia_001', 'id', 'id_ID', 'ig', 'ig_NG', 'ii', 'ii_CN', 'is', 'is_IS', 'it', 'it_CH', 'it_IT', 'it_SM', 'it_VA', 'ja', 'ja_JP', 'jgo', 'jgo_CM', 'jmc', 'jmc_TZ', 'jv', 'jv_ID', 'ka', 'ka_GE', 'kab', 'kab_DZ', 'kam', 'kam_KE', 'kde', 'kde_TZ', 'kea', 'kea_CV', 'khq', 'khq_ML', 'ki', 'ki_KE', 'kk', 'kk_KZ', 'kkj', 'kkj_CM', 'kl', 'kl_GL', 'kln', 'kln_KE', 'km', 'km_KH', 'kn', 'kn_IN', 'ko', 'ko_KP', 'ko_KR', 'kok', 'kok_IN', 'ks', 'ks_IN', 'ksb', 'ksb_TZ', 'ksf', 'ksf_CM', 'ksh', 'ksh_DE', 'ku', 'ku_TR', 'kw', 'kw_GB', 'ky', 'ky_KG', 'lag', 'lag_TZ', 'lb', 'lb_LU', 'lg', 'lg_UG', 'lkt', 'lkt_US', 'ln', 'ln_AO', 'ln_CD', 'ln_CF', 'ln_CG', 'lo', 'lo_LA', 'lrc', 'lrc_IQ', 'lrc_IR', 'lt', 'lt_LT', 'lu', 'lu_CD', 'luo', 'luo_KE', 'luy', 'luy_KE', 'lv', 'lv_LV', 'mas', 'mas_KE', 'mas_TZ', 'mer', 'mer_KE', 'mfe', 'mfe_MU', 'mg', 'mg_MG', 'mgh', 'mgh_MZ', 'mgo', 'mgo_CM', 'mi', 'mi_NZ', 'mk', 'mk_MK', 'ml', 'ml_IN', 'mn', 'mn_MN', 'mr', 'mr_IN', 'ms', 'ms_BN', 'ms_MY', 'ms_SG', 'mt', 'mt_MT', 'mua', 'mua_CM', 'my', 'my_MM', 'mzn', 'mzn_IR', 'naq', 'naq_NA', 'nb', 'nb_NO', 'nb_SJ', 'nd', 'nd_ZW', 'nds', 'nds_DE', 'nds_NL', 'ne', 'ne_IN', 'ne_NP', 'nl', 'nl_AW', 'nl_BE', 'nl_BQ', 'nl_CW', 'nl_NL', 'nl_SR', 'nl_SX', 'nmg', 'nmg_CM', 'nn', 'nn_NO', 'nnh', 'nnh_CM', 'nus', 'nus_SS', 'nyn', 'nyn_UG', 'om', 'om_ET', 'om_KE', 'or', 'or_IN', 'os', 'os_GE', 'os_RU', 'pa', 'pa_Arab', 'pa_Arab_PK', 'pa_Guru', 'pa_Guru_IN', 'pl', 'pl_PL', 'ps', 'ps_AF', 'ps_PK', 'pt', 'pt_AO', 'pt_BR', 'pt_CH', 'pt_CV', 'pt_GQ', 'pt_GW', 'pt_LU', 'pt_MO', 'pt_MZ', 'pt_PT', 'pt_ST', 'pt_TL', 'qu', 'qu_BO', 'qu_EC', 'qu_PE', 'rm', 'rm_CH', 'rn', 'rn_BI', 'ro', 'ro_MD', 'ro_RO', 'rof', 'rof_TZ', 'ru', 'ru_BY', 'ru_KG', 'ru_KZ', 'ru_MD', 'ru_RU', 'ru_UA', 'rw', 'rw_RW', 'rwk', 'rwk_TZ', 'sah', 'sah_RU', 'saq', 'saq_KE', 'sbp', 'sbp_TZ', 'sd', 'sd_PK', 'se', 'se_FI', 'se_NO', 'se_SE', 'seh', 'seh_MZ', 'ses', 'ses_ML', 'sg', 'sg_CF', 'shi', 'shi_Latn', 'shi_Latn_MA', 'shi_Tfng', 'shi_Tfng_MA', 'si', 'si_LK', 'sk', 'sk_SK', 'sl', 'sl_SI', 'smn', 'smn_FI', 'sn', 'sn_ZW', 'so', 'so_DJ', 'so_ET', 'so_KE', 'so_SO', 'sq', 'sq_AL', 'sq_MK', 'sq_XK', 'sr', 'sr_Cyrl', 'sr_Cyrl_BA', 'sr_Cyrl_ME', 'sr_Cyrl_RS', 'sr_Cyrl_XK', 'sr_Latn', 'sr_Latn_BA', 'sr_Latn_ME', 'sr_Latn_RS', 'sr_Latn_XK', 'sv', 'sv_AX', 'sv_FI', 'sv_SE', 'sw', 'sw_CD', 'sw_KE', 'sw_TZ', 'sw_UG', 'ta', 'ta_IN', 'ta_LK', 'ta_MY', 'ta_SG', 'te', 'te_IN', 'teo', 'teo_KE', 'teo_UG', 'tg', 'tg_TJ', 'th', 'th_TH', 'ti', 'ti_ER', 'ti_ET', 'tk', 'tk_TM', 'to', 'to_TO', 'tr', 'tr_CY', 'tr_TR', 'tt', 'tt_RU', 'twq', 'twq_NE', 'tzm', 'tzm_MA', 'ug', 'ug_CN', 'uk', 'uk_UA', 'ur', 'ur_IN', 'ur_PK', 'uz', 'uz_Arab', 'uz_Arab_AF', 'uz_Cyrl', 'uz_Cyrl_UZ', 'uz_Latn', 'uz_Latn_UZ', 'vai', 'vai_Latn', 'vai_Latn_LR', 'vai_Vaii', 'vai_Vaii_LR', 'vi', 'vi_VN', 'vun', 'vun_TZ', 'wae', 'wae_CH', 'wo', 'wo_SN', 'xh', 'xh_ZA', 'xog', 'xog_UG', 'yav', 'yav_CM', 'yi', 'yi_001', 'yo', 'yo_BJ', 'yo_NG', 'yue', 'yue_Hans', 'yue_Hans_CN', 'yue_Hant', 'yue_Hant_HK', 'zgh', 'zgh_MA', 'zh', 'zh_Hans', 'zh_Hans_CN', 'zh_Hans_HK', 'zh_Hans_MO', 'zh_Hans_SG', 'zh_Hant', 'zh_Hant_HK', 'zh_Hant_MO', 'zh_Hant_TW', 'zu', 'zu_ZA'
    );
    const LOCALE_af = 'af';
    const LOCALE_af_NA = 'af_NA';
    const LOCALE_af_ZA = 'af_ZA';
    const LOCALE_agq = 'agq';
    const LOCALE_agq_CM = 'agq_CM';
    const LOCALE_ak = 'ak';
    const LOCALE_ak_GH = 'ak_GH';
    const LOCALE_am = 'am';
    const LOCALE_am_ET = 'am_ET';
    const LOCALE_ar = 'ar';
    const LOCALE_ar_001 = 'ar_001';
    const LOCALE_ar_AE = 'ar_AE';
    const LOCALE_ar_BH = 'ar_BH';
    const LOCALE_ar_DJ = 'ar_DJ';
    const LOCALE_ar_DZ = 'ar_DZ';
    const LOCALE_ar_EG = 'ar_EG';
    const LOCALE_ar_EH = 'ar_EH';
    const LOCALE_ar_ER = 'ar_ER';
    const LOCALE_ar_IL = 'ar_IL';
    const LOCALE_ar_IQ = 'ar_IQ';
    const LOCALE_ar_JO = 'ar_JO';
    const LOCALE_ar_KM = 'ar_KM';
    const LOCALE_ar_KW = 'ar_KW';
    const LOCALE_ar_LB = 'ar_LB';
    const LOCALE_ar_LY = 'ar_LY';
    const LOCALE_ar_MA = 'ar_MA';
    const LOCALE_ar_MR = 'ar_MR';
    const LOCALE_ar_OM = 'ar_OM';
    const LOCALE_ar_PS = 'ar_PS';
    const LOCALE_ar_QA = 'ar_QA';
    const LOCALE_ar_SA = 'ar_SA';
    const LOCALE_ar_SD = 'ar_SD';
    const LOCALE_ar_SO = 'ar_SO';
    const LOCALE_ar_SS = 'ar_SS';
    const LOCALE_ar_SY = 'ar_SY';
    const LOCALE_ar_TD = 'ar_TD';
    const LOCALE_ar_TN = 'ar_TN';
    const LOCALE_ar_YE = 'ar_YE';
    const LOCALE_as = 'as';
    const LOCALE_as_IN = 'as_IN';
    const LOCALE_asa = 'asa';
    const LOCALE_asa_TZ = 'asa_TZ';
    const LOCALE_ast = 'ast';
    const LOCALE_ast_ES = 'ast_ES';
    const LOCALE_az = 'az';
    const LOCALE_az_Cyrl = 'az_Cyrl';
    const LOCALE_az_Cyrl_AZ = 'az_Cyrl_AZ';
    const LOCALE_az_Latn = 'az_Latn';
    const LOCALE_az_Latn_AZ = 'az_Latn_AZ';
    const LOCALE_bas = 'bas';
    const LOCALE_bas_CM = 'bas_CM';
    const LOCALE_be = 'be';
    const LOCALE_be_BY = 'be_BY';
    const LOCALE_bem = 'bem';
    const LOCALE_bem_ZM = 'bem_ZM';
    const LOCALE_bez = 'bez';
    const LOCALE_bez_TZ = 'bez_TZ';
    const LOCALE_bg = 'bg';
    const LOCALE_bg_BG = 'bg_BG';
    const LOCALE_bm = 'bm';
    const LOCALE_bm_ML = 'bm_ML';
    const LOCALE_bn = 'bn';
    const LOCALE_bn_BD = 'bn_BD';
    const LOCALE_bn_IN = 'bn_IN';
    const LOCALE_bo = 'bo';
    const LOCALE_bo_CN = 'bo_CN';
    const LOCALE_bo_IN = 'bo_IN';
    const LOCALE_br = 'br';
    const LOCALE_br_FR = 'br_FR';
    const LOCALE_brx = 'brx';
    const LOCALE_brx_IN = 'brx_IN';
    const LOCALE_bs = 'bs';
    const LOCALE_bs_Cyrl = 'bs_Cyrl';
    const LOCALE_bs_Cyrl_BA = 'bs_Cyrl_BA';
    const LOCALE_bs_Latn = 'bs_Latn';
    const LOCALE_bs_Latn_BA = 'bs_Latn_BA';
    const LOCALE_ca = 'ca';
    const LOCALE_ca_AD = 'ca_AD';
    const LOCALE_ca_ES = 'ca_ES';
    const LOCALE_ca_FR = 'ca_FR';
    const LOCALE_ca_IT = 'ca_IT';
    const LOCALE_ccp = 'ccp';
    const LOCALE_ccp_BD = 'ccp_BD';
    const LOCALE_ccp_IN = 'ccp_IN';
    const LOCALE_ce = 'ce';
    const LOCALE_ce_RU = 'ce_RU';
    const LOCALE_ceb = 'ceb';
    const LOCALE_ceb_PH = 'ceb_PH';
    const LOCALE_cgg = 'cgg';
    const LOCALE_cgg_UG = 'cgg_UG';
    const LOCALE_chr = 'chr';
    const LOCALE_chr_US = 'chr_US';
    const LOCALE_ckb = 'ckb';
    const LOCALE_ckb_IQ = 'ckb_IQ';
    const LOCALE_ckb_IR = 'ckb_IR';
    const LOCALE_cs = 'cs';
    const LOCALE_cs_CZ = 'cs_CZ';
    const LOCALE_cy = 'cy';
    const LOCALE_cy_GB = 'cy_GB';
    const LOCALE_da = 'da';
    const LOCALE_da_DK = 'da_DK';
    const LOCALE_da_GL = 'da_GL';
    const LOCALE_dav = 'dav';
    const LOCALE_dav_KE = 'dav_KE';
    const LOCALE_de = 'de';
    const LOCALE_de_AT = 'de_AT';
    const LOCALE_de_BE = 'de_BE';
    const LOCALE_de_CH = 'de_CH';
    const LOCALE_de_DE = 'de_DE';
    const LOCALE_de_IT = 'de_IT';
    const LOCALE_de_LI = 'de_LI';
    const LOCALE_de_LU = 'de_LU';
    const LOCALE_dje = 'dje';
    const LOCALE_dje_NE = 'dje_NE';
    const LOCALE_dsb = 'dsb';
    const LOCALE_dsb_DE = 'dsb_DE';
    const LOCALE_dua = 'dua';
    const LOCALE_dua_CM = 'dua_CM';
    const LOCALE_dyo = 'dyo';
    const LOCALE_dyo_SN = 'dyo_SN';
    const LOCALE_dz = 'dz';
    const LOCALE_dz_BT = 'dz_BT';
    const LOCALE_ebu = 'ebu';
    const LOCALE_ebu_KE = 'ebu_KE';
    const LOCALE_ee = 'ee';
    const LOCALE_ee_GH = 'ee_GH';
    const LOCALE_ee_TG = 'ee_TG';
    const LOCALE_el = 'el';
    const LOCALE_el_CY = 'el_CY';
    const LOCALE_el_GR = 'el_GR';
    const LOCALE_en = 'en';
    const LOCALE_en_001 = 'en_001';
    const LOCALE_en_150 = 'en_150';
    const LOCALE_en_AE = 'en_AE';
    const LOCALE_en_AG = 'en_AG';
    const LOCALE_en_AI = 'en_AI';
    const LOCALE_en_AS = 'en_AS';
    const LOCALE_en_AT = 'en_AT';
    const LOCALE_en_AU = 'en_AU';
    const LOCALE_en_BB = 'en_BB';
    const LOCALE_en_BE = 'en_BE';
    const LOCALE_en_BI = 'en_BI';
    const LOCALE_en_BM = 'en_BM';
    const LOCALE_en_BS = 'en_BS';
    const LOCALE_en_BW = 'en_BW';
    const LOCALE_en_BZ = 'en_BZ';
    const LOCALE_en_CA = 'en_CA';
    const LOCALE_en_CC = 'en_CC';
    const LOCALE_en_CH = 'en_CH';
    const LOCALE_en_CK = 'en_CK';
    const LOCALE_en_CM = 'en_CM';
    const LOCALE_en_CX = 'en_CX';
    const LOCALE_en_CY = 'en_CY';
    const LOCALE_en_DE = 'en_DE';
    const LOCALE_en_DG = 'en_DG';
    const LOCALE_en_DK = 'en_DK';
    const LOCALE_en_DM = 'en_DM';
    const LOCALE_en_ER = 'en_ER';
    const LOCALE_en_FI = 'en_FI';
    const LOCALE_en_FJ = 'en_FJ';
    const LOCALE_en_FK = 'en_FK';
    const LOCALE_en_FM = 'en_FM';
    const LOCALE_en_GB = 'en_GB';
    const LOCALE_en_GD = 'en_GD';
    const LOCALE_en_GG = 'en_GG';
    const LOCALE_en_GH = 'en_GH';
    const LOCALE_en_GI = 'en_GI';
    const LOCALE_en_GM = 'en_GM';
    const LOCALE_en_GU = 'en_GU';
    const LOCALE_en_GY = 'en_GY';
    const LOCALE_en_HK = 'en_HK';
    const LOCALE_en_IE = 'en_IE';
    const LOCALE_en_IL = 'en_IL';
    const LOCALE_en_IM = 'en_IM';
    const LOCALE_en_IN = 'en_IN';
    const LOCALE_en_IO = 'en_IO';
    const LOCALE_en_JE = 'en_JE';
    const LOCALE_en_JM = 'en_JM';
    const LOCALE_en_KE = 'en_KE';
    const LOCALE_en_KI = 'en_KI';
    const LOCALE_en_KN = 'en_KN';
    const LOCALE_en_KY = 'en_KY';
    const LOCALE_en_LC = 'en_LC';
    const LOCALE_en_LR = 'en_LR';
    const LOCALE_en_LS = 'en_LS';
    const LOCALE_en_MG = 'en_MG';
    const LOCALE_en_MH = 'en_MH';
    const LOCALE_en_MO = 'en_MO';
    const LOCALE_en_MP = 'en_MP';
    const LOCALE_en_MS = 'en_MS';
    const LOCALE_en_MT = 'en_MT';
    const LOCALE_en_MU = 'en_MU';
    const LOCALE_en_MW = 'en_MW';
    const LOCALE_en_MY = 'en_MY';
    const LOCALE_en_NA = 'en_NA';
    const LOCALE_en_NF = 'en_NF';
    const LOCALE_en_NG = 'en_NG';
    const LOCALE_en_NL = 'en_NL';
    const LOCALE_en_NR = 'en_NR';
    const LOCALE_en_NU = 'en_NU';
    const LOCALE_en_NZ = 'en_NZ';
    const LOCALE_en_PG = 'en_PG';
    const LOCALE_en_PH = 'en_PH';
    const LOCALE_en_PK = 'en_PK';
    const LOCALE_en_PN = 'en_PN';
    const LOCALE_en_PR = 'en_PR';
    const LOCALE_en_PW = 'en_PW';
    const LOCALE_en_RW = 'en_RW';
    const LOCALE_en_SB = 'en_SB';
    const LOCALE_en_SC = 'en_SC';
    const LOCALE_en_SD = 'en_SD';
    const LOCALE_en_SE = 'en_SE';
    const LOCALE_en_SG = 'en_SG';
    const LOCALE_en_SH = 'en_SH';
    const LOCALE_en_SI = 'en_SI';
    const LOCALE_en_SL = 'en_SL';
    const LOCALE_en_SS = 'en_SS';
    const LOCALE_en_SX = 'en_SX';
    const LOCALE_en_SZ = 'en_SZ';
    const LOCALE_en_TC = 'en_TC';
    const LOCALE_en_TK = 'en_TK';
    const LOCALE_en_TO = 'en_TO';
    const LOCALE_en_TT = 'en_TT';
    const LOCALE_en_TV = 'en_TV';
    const LOCALE_en_TZ = 'en_TZ';
    const LOCALE_en_UG = 'en_UG';
    const LOCALE_en_UM = 'en_UM';
    const LOCALE_en_US = 'en_US';
    const LOCALE_en_US_POSIX = 'en_US_POSIX';
    const LOCALE_en_VC = 'en_VC';
    const LOCALE_en_VG = 'en_VG';
    const LOCALE_en_VI = 'en_VI';
    const LOCALE_en_VU = 'en_VU';
    const LOCALE_en_WS = 'en_WS';
    const LOCALE_en_ZA = 'en_ZA';
    const LOCALE_en_ZM = 'en_ZM';
    const LOCALE_en_ZW = 'en_ZW';
    const LOCALE_eo = 'eo';
    const LOCALE_eo_001 = 'eo_001';
    const LOCALE_es = 'es';
    const LOCALE_es_419 = 'es_419';
    const LOCALE_es_AR = 'es_AR';
    const LOCALE_es_BO = 'es_BO';
    const LOCALE_es_BR = 'es_BR';
    const LOCALE_es_BZ = 'es_BZ';
    const LOCALE_es_CL = 'es_CL';
    const LOCALE_es_CO = 'es_CO';
    const LOCALE_es_CR = 'es_CR';
    const LOCALE_es_CU = 'es_CU';
    const LOCALE_es_DO = 'es_DO';
    const LOCALE_es_EA = 'es_EA';
    const LOCALE_es_EC = 'es_EC';
    const LOCALE_es_ES = 'es_ES';
    const LOCALE_es_GQ = 'es_GQ';
    const LOCALE_es_GT = 'es_GT';
    const LOCALE_es_HN = 'es_HN';
    const LOCALE_es_IC = 'es_IC';
    const LOCALE_es_MX = 'es_MX';
    const LOCALE_es_NI = 'es_NI';
    const LOCALE_es_PA = 'es_PA';
    const LOCALE_es_PE = 'es_PE';
    const LOCALE_es_PH = 'es_PH';
    const LOCALE_es_PR = 'es_PR';
    const LOCALE_es_PY = 'es_PY';
    const LOCALE_es_SV = 'es_SV';
    const LOCALE_es_US = 'es_US';
    const LOCALE_es_UY = 'es_UY';
    const LOCALE_es_VE = 'es_VE';
    const LOCALE_et = 'et';
    const LOCALE_et_EE = 'et_EE';
    const LOCALE_eu = 'eu';
    const LOCALE_eu_ES = 'eu_ES';
    const LOCALE_ewo = 'ewo';
    const LOCALE_ewo_CM = 'ewo_CM';
    const LOCALE_fa = 'fa';
    const LOCALE_fa_AF = 'fa_AF';
    const LOCALE_fa_IR = 'fa_IR';
    const LOCALE_ff = 'ff';
    const LOCALE_ff_Latn = 'ff_Latn';
    const LOCALE_ff_Latn_BF = 'ff_Latn_BF';
    const LOCALE_ff_Latn_CM = 'ff_Latn_CM';
    const LOCALE_ff_Latn_GH = 'ff_Latn_GH';
    const LOCALE_ff_Latn_GM = 'ff_Latn_GM';
    const LOCALE_ff_Latn_GN = 'ff_Latn_GN';
    const LOCALE_ff_Latn_GW = 'ff_Latn_GW';
    const LOCALE_ff_Latn_LR = 'ff_Latn_LR';
    const LOCALE_ff_Latn_MR = 'ff_Latn_MR';
    const LOCALE_ff_Latn_NE = 'ff_Latn_NE';
    const LOCALE_ff_Latn_NG = 'ff_Latn_NG';
    const LOCALE_ff_Latn_SL = 'ff_Latn_SL';
    const LOCALE_ff_Latn_SN = 'ff_Latn_SN';
    const LOCALE_fi = 'fi';
    const LOCALE_fi_FI = 'fi_FI';
    const LOCALE_fil = 'fil';
    const LOCALE_fil_PH = 'fil_PH';
    const LOCALE_fo = 'fo';
    const LOCALE_fo_DK = 'fo_DK';
    const LOCALE_fo_FO = 'fo_FO';
    const LOCALE_fr = 'fr';
    const LOCALE_fr_BE = 'fr_BE';
    const LOCALE_fr_BF = 'fr_BF';
    const LOCALE_fr_BI = 'fr_BI';
    const LOCALE_fr_BJ = 'fr_BJ';
    const LOCALE_fr_BL = 'fr_BL';
    const LOCALE_fr_CA = 'fr_CA';
    const LOCALE_fr_CD = 'fr_CD';
    const LOCALE_fr_CF = 'fr_CF';
    const LOCALE_fr_CG = 'fr_CG';
    const LOCALE_fr_CH = 'fr_CH';
    const LOCALE_fr_CI = 'fr_CI';
    const LOCALE_fr_CM = 'fr_CM';
    const LOCALE_fr_DJ = 'fr_DJ';
    const LOCALE_fr_DZ = 'fr_DZ';
    const LOCALE_fr_FR = 'fr_FR';
    const LOCALE_fr_GA = 'fr_GA';
    const LOCALE_fr_GF = 'fr_GF';
    const LOCALE_fr_GN = 'fr_GN';
    const LOCALE_fr_GP = 'fr_GP';
    const LOCALE_fr_GQ = 'fr_GQ';
    const LOCALE_fr_HT = 'fr_HT';
    const LOCALE_fr_KM = 'fr_KM';
    const LOCALE_fr_LU = 'fr_LU';
    const LOCALE_fr_MA = 'fr_MA';
    const LOCALE_fr_MC = 'fr_MC';
    const LOCALE_fr_MF = 'fr_MF';
    const LOCALE_fr_MG = 'fr_MG';
    const LOCALE_fr_ML = 'fr_ML';
    const LOCALE_fr_MQ = 'fr_MQ';
    const LOCALE_fr_MR = 'fr_MR';
    const LOCALE_fr_MU = 'fr_MU';
    const LOCALE_fr_NC = 'fr_NC';
    const LOCALE_fr_NE = 'fr_NE';
    const LOCALE_fr_PF = 'fr_PF';
    const LOCALE_fr_PM = 'fr_PM';
    const LOCALE_fr_RE = 'fr_RE';
    const LOCALE_fr_RW = 'fr_RW';
    const LOCALE_fr_SC = 'fr_SC';
    const LOCALE_fr_SN = 'fr_SN';
    const LOCALE_fr_SY = 'fr_SY';
    const LOCALE_fr_TD = 'fr_TD';
    const LOCALE_fr_TG = 'fr_TG';
    const LOCALE_fr_TN = 'fr_TN';
    const LOCALE_fr_VU = 'fr_VU';
    const LOCALE_fr_WF = 'fr_WF';
    const LOCALE_fr_YT = 'fr_YT';
    const LOCALE_fur = 'fur';
    const LOCALE_fur_IT = 'fur_IT';
    const LOCALE_fy = 'fy';
    const LOCALE_fy_NL = 'fy_NL';
    const LOCALE_ga = 'ga';
    const LOCALE_ga_GB = 'ga_GB';
    const LOCALE_ga_IE = 'ga_IE';
    const LOCALE_gd = 'gd';
    const LOCALE_gd_GB = 'gd_GB';
    const LOCALE_gl = 'gl';
    const LOCALE_gl_ES = 'gl_ES';
    const LOCALE_gsw = 'gsw';
    const LOCALE_gsw_CH = 'gsw_CH';
    const LOCALE_gsw_FR = 'gsw_FR';
    const LOCALE_gsw_LI = 'gsw_LI';
    const LOCALE_gu = 'gu';
    const LOCALE_gu_IN = 'gu_IN';
    const LOCALE_guz = 'guz';
    const LOCALE_guz_KE = 'guz_KE';
    const LOCALE_gv = 'gv';
    const LOCALE_gv_IM = 'gv_IM';
    const LOCALE_ha = 'ha';
    const LOCALE_ha_GH = 'ha_GH';
    const LOCALE_ha_NE = 'ha_NE';
    const LOCALE_ha_NG = 'ha_NG';
    const LOCALE_haw = 'haw';
    const LOCALE_haw_US = 'haw_US';
    const LOCALE_he = 'he';
    const LOCALE_he_IL = 'he_IL';
    const LOCALE_hi = 'hi';
    const LOCALE_hi_IN = 'hi_IN';
    const LOCALE_hr = 'hr';
    const LOCALE_hr_BA = 'hr_BA';
    const LOCALE_hr_HR = 'hr_HR';
    const LOCALE_hsb = 'hsb';
    const LOCALE_hsb_DE = 'hsb_DE';
    const LOCALE_hu = 'hu';
    const LOCALE_hu_HU = 'hu_HU';
    const LOCALE_hy = 'hy';
    const LOCALE_hy_AM = 'hy_AM';
    const LOCALE_ia = 'ia';
    const LOCALE_ia_001 = 'ia_001';
    const LOCALE_id = 'id';
    const LOCALE_id_ID = 'id_ID';
    const LOCALE_ig = 'ig';
    const LOCALE_ig_NG = 'ig_NG';
    const LOCALE_ii = 'ii';
    const LOCALE_ii_CN = 'ii_CN';
    const LOCALE_is = 'is';
    const LOCALE_is_IS = 'is_IS';
    const LOCALE_it = 'it';
    const LOCALE_it_CH = 'it_CH';
    const LOCALE_it_IT = 'it_IT';
    const LOCALE_it_SM = 'it_SM';
    const LOCALE_it_VA = 'it_VA';
    const LOCALE_ja = 'ja';
    const LOCALE_ja_JP = 'ja_JP';
    const LOCALE_jgo = 'jgo';
    const LOCALE_jgo_CM = 'jgo_CM';
    const LOCALE_jmc = 'jmc';
    const LOCALE_jmc_TZ = 'jmc_TZ';
    const LOCALE_jv = 'jv';
    const LOCALE_jv_ID = 'jv_ID';
    const LOCALE_ka = 'ka';
    const LOCALE_ka_GE = 'ka_GE';
    const LOCALE_kab = 'kab';
    const LOCALE_kab_DZ = 'kab_DZ';
    const LOCALE_kam = 'kam';
    const LOCALE_kam_KE = 'kam_KE';
    const LOCALE_kde = 'kde';
    const LOCALE_kde_TZ = 'kde_TZ';
    const LOCALE_kea = 'kea';
    const LOCALE_kea_CV = 'kea_CV';
    const LOCALE_khq = 'khq';
    const LOCALE_khq_ML = 'khq_ML';
    const LOCALE_ki = 'ki';
    const LOCALE_ki_KE = 'ki_KE';
    const LOCALE_kk = 'kk';
    const LOCALE_kk_KZ = 'kk_KZ';
    const LOCALE_kkj = 'kkj';
    const LOCALE_kkj_CM = 'kkj_CM';
    const LOCALE_kl = 'kl';
    const LOCALE_kl_GL = 'kl_GL';
    const LOCALE_kln = 'kln';
    const LOCALE_kln_KE = 'kln_KE';
    const LOCALE_km = 'km';
    const LOCALE_km_KH = 'km_KH';
    const LOCALE_kn = 'kn';
    const LOCALE_kn_IN = 'kn_IN';
    const LOCALE_ko = 'ko';
    const LOCALE_ko_KP = 'ko_KP';
    const LOCALE_ko_KR = 'ko_KR';
    const LOCALE_kok = 'kok';
    const LOCALE_kok_IN = 'kok_IN';
    const LOCALE_ks = 'ks';
    const LOCALE_ks_IN = 'ks_IN';
    const LOCALE_ksb = 'ksb';
    const LOCALE_ksb_TZ = 'ksb_TZ';
    const LOCALE_ksf = 'ksf';
    const LOCALE_ksf_CM = 'ksf_CM';
    const LOCALE_ksh = 'ksh';
    const LOCALE_ksh_DE = 'ksh_DE';
    const LOCALE_ku = 'ku';
    const LOCALE_ku_TR = 'ku_TR';
    const LOCALE_kw = 'kw';
    const LOCALE_kw_GB = 'kw_GB';
    const LOCALE_ky = 'ky';
    const LOCALE_ky_KG = 'ky_KG';
    const LOCALE_lag = 'lag';
    const LOCALE_lag_TZ = 'lag_TZ';
    const LOCALE_lb = 'lb';
    const LOCALE_lb_LU = 'lb_LU';
    const LOCALE_lg = 'lg';
    const LOCALE_lg_UG = 'lg_UG';
    const LOCALE_lkt = 'lkt';
    const LOCALE_lkt_US = 'lkt_US';
    const LOCALE_ln = 'ln';
    const LOCALE_ln_AO = 'ln_AO';
    const LOCALE_ln_CD = 'ln_CD';
    const LOCALE_ln_CF = 'ln_CF';
    const LOCALE_ln_CG = 'ln_CG';
    const LOCALE_lo = 'lo';
    const LOCALE_lo_LA = 'lo_LA';
    const LOCALE_lrc = 'lrc';
    const LOCALE_lrc_IQ = 'lrc_IQ';
    const LOCALE_lrc_IR = 'lrc_IR';
    const LOCALE_lt = 'lt';
    const LOCALE_lt_LT = 'lt_LT';
    const LOCALE_lu = 'lu';
    const LOCALE_lu_CD = 'lu_CD';
    const LOCALE_luo = 'luo';
    const LOCALE_luo_KE = 'luo_KE';
    const LOCALE_luy = 'luy';
    const LOCALE_luy_KE = 'luy_KE';
    const LOCALE_lv = 'lv';
    const LOCALE_lv_LV = 'lv_LV';
    const LOCALE_mas = 'mas';
    const LOCALE_mas_KE = 'mas_KE';
    const LOCALE_mas_TZ = 'mas_TZ';
    const LOCALE_mer = 'mer';
    const LOCALE_mer_KE = 'mer_KE';
    const LOCALE_mfe = 'mfe';
    const LOCALE_mfe_MU = 'mfe_MU';
    const LOCALE_mg = 'mg';
    const LOCALE_mg_MG = 'mg_MG';
    const LOCALE_mgh = 'mgh';
    const LOCALE_mgh_MZ = 'mgh_MZ';
    const LOCALE_mgo = 'mgo';
    const LOCALE_mgo_CM = 'mgo_CM';
    const LOCALE_mi = 'mi';
    const LOCALE_mi_NZ = 'mi_NZ';
    const LOCALE_mk = 'mk';
    const LOCALE_mk_MK = 'mk_MK';
    const LOCALE_ml = 'ml';
    const LOCALE_ml_IN = 'ml_IN';
    const LOCALE_mn = 'mn';
    const LOCALE_mn_MN = 'mn_MN';
    const LOCALE_mr = 'mr';
    const LOCALE_mr_IN = 'mr_IN';
    const LOCALE_ms = 'ms';
    const LOCALE_ms_BN = 'ms_BN';
    const LOCALE_ms_MY = 'ms_MY';
    const LOCALE_ms_SG = 'ms_SG';
    const LOCALE_mt = 'mt';
    const LOCALE_mt_MT = 'mt_MT';
    const LOCALE_mua = 'mua';
    const LOCALE_mua_CM = 'mua_CM';
    const LOCALE_my = 'my';
    const LOCALE_my_MM = 'my_MM';
    const LOCALE_mzn = 'mzn';
    const LOCALE_mzn_IR = 'mzn_IR';
    const LOCALE_naq = 'naq';
    const LOCALE_naq_NA = 'naq_NA';
    const LOCALE_nb = 'nb';
    const LOCALE_nb_NO = 'nb_NO';
    const LOCALE_nb_SJ = 'nb_SJ';
    const LOCALE_nd = 'nd';
    const LOCALE_nd_ZW = 'nd_ZW';
    const LOCALE_nds = 'nds';
    const LOCALE_nds_DE = 'nds_DE';
    const LOCALE_nds_NL = 'nds_NL';
    const LOCALE_ne = 'ne';
    const LOCALE_ne_IN = 'ne_IN';
    const LOCALE_ne_NP = 'ne_NP';
    const LOCALE_nl = 'nl';
    const LOCALE_nl_AW = 'nl_AW';
    const LOCALE_nl_BE = 'nl_BE';
    const LOCALE_nl_BQ = 'nl_BQ';
    const LOCALE_nl_CW = 'nl_CW';
    const LOCALE_nl_NL = 'nl_NL';
    const LOCALE_nl_SR = 'nl_SR';
    const LOCALE_nl_SX = 'nl_SX';
    const LOCALE_nmg = 'nmg';
    const LOCALE_nmg_CM = 'nmg_CM';
    const LOCALE_nn = 'nn';
    const LOCALE_nn_NO = 'nn_NO';
    const LOCALE_nnh = 'nnh';
    const LOCALE_nnh_CM = 'nnh_CM';
    const LOCALE_nus = 'nus';
    const LOCALE_nus_SS = 'nus_SS';
    const LOCALE_nyn = 'nyn';
    const LOCALE_nyn_UG = 'nyn_UG';
    const LOCALE_om = 'om';
    const LOCALE_om_ET = 'om_ET';
    const LOCALE_om_KE = 'om_KE';
    const LOCALE_or = 'or';
    const LOCALE_or_IN = 'or_IN';
    const LOCALE_os = 'os';
    const LOCALE_os_GE = 'os_GE';
    const LOCALE_os_RU = 'os_RU';
    const LOCALE_pa = 'pa';
    const LOCALE_pa_Arab = 'pa_Arab';
    const LOCALE_pa_Arab_PK = 'pa_Arab_PK';
    const LOCALE_pa_Guru = 'pa_Guru';
    const LOCALE_pa_Guru_IN = 'pa_Guru_IN';
    const LOCALE_pl = 'pl';
    const LOCALE_pl_PL = 'pl_PL';
    const LOCALE_ps = 'ps';
    const LOCALE_ps_AF = 'ps_AF';
    const LOCALE_ps_PK = 'ps_PK';
    const LOCALE_pt = 'pt';
    const LOCALE_pt_AO = 'pt_AO';
    const LOCALE_pt_BR = 'pt_BR';
    const LOCALE_pt_CH = 'pt_CH';
    const LOCALE_pt_CV = 'pt_CV';
    const LOCALE_pt_GQ = 'pt_GQ';
    const LOCALE_pt_GW = 'pt_GW';
    const LOCALE_pt_LU = 'pt_LU';
    const LOCALE_pt_MO = 'pt_MO';
    const LOCALE_pt_MZ = 'pt_MZ';
    const LOCALE_pt_PT = 'pt_PT';
    const LOCALE_pt_ST = 'pt_ST';
    const LOCALE_pt_TL = 'pt_TL';
    const LOCALE_qu = 'qu';
    const LOCALE_qu_BO = 'qu_BO';
    const LOCALE_qu_EC = 'qu_EC';
    const LOCALE_qu_PE = 'qu_PE';
    const LOCALE_rm = 'rm';
    const LOCALE_rm_CH = 'rm_CH';
    const LOCALE_rn = 'rn';
    const LOCALE_rn_BI = 'rn_BI';
    const LOCALE_ro = 'ro';
    const LOCALE_ro_MD = 'ro_MD';
    const LOCALE_ro_RO = 'ro_RO';
    const LOCALE_rof = 'rof';
    const LOCALE_rof_TZ = 'rof_TZ';
    const LOCALE_ru = 'ru';
    const LOCALE_ru_BY = 'ru_BY';
    const LOCALE_ru_KG = 'ru_KG';
    const LOCALE_ru_KZ = 'ru_KZ';
    const LOCALE_ru_MD = 'ru_MD';
    const LOCALE_ru_RU = 'ru_RU';
    const LOCALE_ru_UA = 'ru_UA';
    const LOCALE_rw = 'rw';
    const LOCALE_rw_RW = 'rw_RW';
    const LOCALE_rwk = 'rwk';
    const LOCALE_rwk_TZ = 'rwk_TZ';
    const LOCALE_sah = 'sah';
    const LOCALE_sah_RU = 'sah_RU';
    const LOCALE_saq = 'saq';
    const LOCALE_saq_KE = 'saq_KE';
    const LOCALE_sbp = 'sbp';
    const LOCALE_sbp_TZ = 'sbp_TZ';
    const LOCALE_sd = 'sd';
    const LOCALE_sd_PK = 'sd_PK';
    const LOCALE_se = 'se';
    const LOCALE_se_FI = 'se_FI';
    const LOCALE_se_NO = 'se_NO';
    const LOCALE_se_SE = 'se_SE';
    const LOCALE_seh = 'seh';
    const LOCALE_seh_MZ = 'seh_MZ';
    const LOCALE_ses = 'ses';
    const LOCALE_ses_ML = 'ses_ML';
    const LOCALE_sg = 'sg';
    const LOCALE_sg_CF = 'sg_CF';
    const LOCALE_shi = 'shi';
    const LOCALE_shi_Latn = 'shi_Latn';
    const LOCALE_shi_Latn_MA = 'shi_Latn_MA';
    const LOCALE_shi_Tfng = 'shi_Tfng';
    const LOCALE_shi_Tfng_MA = 'shi_Tfng_MA';
    const LOCALE_si = 'si';
    const LOCALE_si_LK = 'si_LK';
    const LOCALE_sk = 'sk';
    const LOCALE_sk_SK = 'sk_SK';
    const LOCALE_sl = 'sl';
    const LOCALE_sl_SI = 'sl_SI';
    const LOCALE_smn = 'smn';
    const LOCALE_smn_FI = 'smn_FI';
    const LOCALE_sn = 'sn';
    const LOCALE_sn_ZW = 'sn_ZW';
    const LOCALE_so = 'so';
    const LOCALE_so_DJ = 'so_DJ';
    const LOCALE_so_ET = 'so_ET';
    const LOCALE_so_KE = 'so_KE';
    const LOCALE_so_SO = 'so_SO';
    const LOCALE_sq = 'sq';
    const LOCALE_sq_AL = 'sq_AL';
    const LOCALE_sq_MK = 'sq_MK';
    const LOCALE_sq_XK = 'sq_XK';
    const LOCALE_sr = 'sr';
    const LOCALE_sr_Cyrl = 'sr_Cyrl';
    const LOCALE_sr_Cyrl_BA = 'sr_Cyrl_BA';
    const LOCALE_sr_Cyrl_ME = 'sr_Cyrl_ME';
    const LOCALE_sr_Cyrl_RS = 'sr_Cyrl_RS';
    const LOCALE_sr_Cyrl_XK = 'sr_Cyrl_XK';
    const LOCALE_sr_Latn = 'sr_Latn';
    const LOCALE_sr_Latn_BA = 'sr_Latn_BA';
    const LOCALE_sr_Latn_ME = 'sr_Latn_ME';
    const LOCALE_sr_Latn_RS = 'sr_Latn_RS';
    const LOCALE_sr_Latn_XK = 'sr_Latn_XK';
    const LOCALE_sv = 'sv';
    const LOCALE_sv_AX = 'sv_AX';
    const LOCALE_sv_FI = 'sv_FI';
    const LOCALE_sv_SE = 'sv_SE';
    const LOCALE_sw = 'sw';
    const LOCALE_sw_CD = 'sw_CD';
    const LOCALE_sw_KE = 'sw_KE';
    const LOCALE_sw_TZ = 'sw_TZ';
    const LOCALE_sw_UG = 'sw_UG';
    const LOCALE_ta = 'ta';
    const LOCALE_ta_IN = 'ta_IN';
    const LOCALE_ta_LK = 'ta_LK';
    const LOCALE_ta_MY = 'ta_MY';
    const LOCALE_ta_SG = 'ta_SG';
    const LOCALE_te = 'te';
    const LOCALE_te_IN = 'te_IN';
    const LOCALE_teo = 'teo';
    const LOCALE_teo_KE = 'teo_KE';
    const LOCALE_teo_UG = 'teo_UG';
    const LOCALE_tg = 'tg';
    const LOCALE_tg_TJ = 'tg_TJ';
    const LOCALE_th = 'th';
    const LOCALE_th_TH = 'th_TH';
    const LOCALE_ti = 'ti';
    const LOCALE_ti_ER = 'ti_ER';
    const LOCALE_ti_ET = 'ti_ET';
    const LOCALE_tk = 'tk';
    const LOCALE_tk_TM = 'tk_TM';
    const LOCALE_to = 'to';
    const LOCALE_to_TO = 'to_TO';
    const LOCALE_tr = 'tr';
    const LOCALE_tr_CY = 'tr_CY';
    const LOCALE_tr_TR = 'tr_TR';
    const LOCALE_tt = 'tt';
    const LOCALE_tt_RU = 'tt_RU';
    const LOCALE_twq = 'twq';
    const LOCALE_twq_NE = 'twq_NE';
    const LOCALE_tzm = 'tzm';
    const LOCALE_tzm_MA = 'tzm_MA';
    const LOCALE_ug = 'ug';
    const LOCALE_ug_CN = 'ug_CN';
    const LOCALE_uk = 'uk';
    const LOCALE_uk_UA = 'uk_UA';
    const LOCALE_ur = 'ur';
    const LOCALE_ur_IN = 'ur_IN';
    const LOCALE_ur_PK = 'ur_PK';
    const LOCALE_uz = 'uz';
    const LOCALE_uz_Arab = 'uz_Arab';
    const LOCALE_uz_Arab_AF = 'uz_Arab_AF';
    const LOCALE_uz_Cyrl = 'uz_Cyrl';
    const LOCALE_uz_Cyrl_UZ = 'uz_Cyrl_UZ';
    const LOCALE_uz_Latn = 'uz_Latn';
    const LOCALE_uz_Latn_UZ = 'uz_Latn_UZ';
    const LOCALE_vai = 'vai';
    const LOCALE_vai_Latn = 'vai_Latn';
    const LOCALE_vai_Latn_LR = 'vai_Latn_LR';
    const LOCALE_vai_Vaii = 'vai_Vaii';
    const LOCALE_vai_Vaii_LR = 'vai_Vaii_LR';
    const LOCALE_vi = 'vi';
    const LOCALE_vi_VN = 'vi_VN';
    const LOCALE_vun = 'vun';
    const LOCALE_vun_TZ = 'vun_TZ';
    const LOCALE_wae = 'wae';
    const LOCALE_wae_CH = 'wae_CH';
    const LOCALE_wo = 'wo';
    const LOCALE_wo_SN = 'wo_SN';
    const LOCALE_xh = 'xh';
    const LOCALE_xh_ZA = 'xh_ZA';
    const LOCALE_xog = 'xog';
    const LOCALE_xog_UG = 'xog_UG';
    const LOCALE_yav = 'yav';
    const LOCALE_yav_CM = 'yav_CM';
    const LOCALE_yi = 'yi';
    const LOCALE_yi_001 = 'yi_001';
    const LOCALE_yo = 'yo';
    const LOCALE_yo_BJ = 'yo_BJ';
    const LOCALE_yo_NG = 'yo_NG';
    const LOCALE_yue = 'yue';
    const LOCALE_yue_Hans = 'yue_Hans';
    const LOCALE_yue_Hans_CN = 'yue_Hans_CN';
    const LOCALE_yue_Hant = 'yue_Hant';
    const LOCALE_yue_Hant_HK = 'yue_Hant_HK';
    const LOCALE_zgh = 'zgh';
    const LOCALE_zgh_MA = 'zgh_MA';
    const LOCALE_zh = 'zh';
    const LOCALE_zh_Hans = 'zh_Hans';
    const LOCALE_zh_Hans_CN = 'zh_Hans_CN';
    const LOCALE_zh_Hans_HK = 'zh_Hans_HK';
    const LOCALE_zh_Hans_MO = 'zh_Hans_MO';
    const LOCALE_zh_Hans_SG = 'zh_Hans_SG';
    const LOCALE_zh_Hant = 'zh_Hant';
    const LOCALE_zh_Hant_HK = 'zh_Hant_HK';
    const LOCALE_zh_Hant_MO = 'zh_Hant_MO';
    const LOCALE_zh_Hant_TW = 'zh_Hant_TW';
    const LOCALE_zu = 'zu';
    const LOCALE_zu_ZA = 'zu_ZA';    
}
