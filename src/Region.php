<?php
namespace InteractivePlus\LibI18N;
class Region{
    public static function isValidRegion(string $region) : bool{
        $region = strtoupper($region);
        if(strlen($region) !== 2){
            return false;
        }
        if(!in_array($region,self::allRegions,true)){
            return false;
        }
        return true;
    }
    public static function fixRegion(string $region, string $defaultRegion) : string{
        if(!self::isValidRegion($region)){
            return $defaultRegion;
        }else{
            return $region;
        }
    }
    public static function getDisplayName(string $region, string $in_Locale = 'en-US') : string{
        return locale_get_display_region('-' . $region,$in_Locale);
    }
    const allRegions = array(
        'NA', 'ZA', 'CM', 'GH', 'ET', 'AE', 'BH', 'DJ', 'DZ', 'EG', 'EH', 'ER', 'IL', 'IQ', 'JO', 'KM', 'KW', 'LB', 'LY', 'MA', 'MR', 'OM', 'PS', 'QA', 'SA', 'SD', 'SO', 'SS', 'SY', 'TD', 'TN', 'YE', 'IN', 'TZ', 'ES', 'AZ', 'BY', 'ZM', 'BG', 'ML', 'BD', 'CN', 'FR', 'BA', 'AD', 'IT', 'RU', 'PH', 'UG', 'US', 'IR', 'CZ', 'GB', 'DK', 'GL', 'KE', 'AT', 'BE', 'CH', 'DE', 'LI', 'LU', 'NE', 'SN', 'BT', 'TG', 'CY', 'GR', '150', 'AG', 'AI', 'AS', 'AU', 'BB', 'BI', 'BM', 'BS', 'BW', 'BZ', 'CA', 'CC', 'CK', 'CX', 'DG', 'DM', 'FI', 'FJ', 'FK', 'FM', 'GD', 'GG', 'GI', 'GM', 'GU', 'GY', 'HK', 'IE', 'IM', 'IO', 'JE', 'JM', 'KI', 'KN', 'KY', 'LC', 'LR', 'LS', 'MG', 'MH', 'MO', 'MP', 'MS', 'MT', 'MU', 'MW', 'MY', 'NF', 'NG', 'NL', 'NR', 'NU', 'NZ', 'PG', 'PK', 'PN', 'PR', 'PW', 'RW', 'SB', 'SC', 'SE', 'SG', 'SH', 'SI', 'SL', 'SX', 'SZ', 'TC', 'TK', 'TO', 'TT', 'TV', 'UM', 'VC', 'VG', 'VI', 'VU', 'WS', 'ZW', '419', 'AR', 'BO', 'BR', 'CL', 'CO', 'CR', 'CU', 'DO', 'EA', 'EC', 'GQ', 'GT', 'HN', 'IC', 'MX', 'NI', 'PA', 'PE', 'PY', 'SV', 'UY', 'VE', 'EE', 'AF', 'BF', 'GN', 'GW', 'FO', 'BJ', 'BL', 'CD', 'CF', 'CG', 'CI', 'GA', 'GF', 'GP', 'HT', 'MC', 'MF', 'MQ', 'NC', 'PF', 'PM', 'RE', 'WF', 'YT', 'HR', 'HU', 'AM', 'ID', 'IS', 'SM', 'VA', 'JP', 'GE', 'CV', 'KZ', 'KH', 'KP', 'KR', 'TR', 'KG', 'AO', 'LA', 'LT', 'LV', 'MZ', 'MK', 'MN', 'BN', 'MM', 'NO', 'SJ', 'NP', 'AW', 'BQ', 'CW', 'SR', 'PL', 'PT', 'ST', 'TL', 'MD', 'RO', 'UA', 'LK', 'SK', 'AL', 'XK', 'ME', 'RS', 'AX', 'TJ', 'TH', 'TM', 'UZ', 'VN', 'TW'
    );
    const REGION_NA = 'NA';
    const REGION_ZA = 'ZA';
    const REGION_CM = 'CM';
    const REGION_GH = 'GH';
    const REGION_ET = 'ET';
    const REGION_001 = '001';
    const REGION_AE = 'AE';
    const REGION_BH = 'BH';
    const REGION_DJ = 'DJ';
    const REGION_DZ = 'DZ';
    const REGION_EG = 'EG';
    const REGION_EH = 'EH';
    const REGION_ER = 'ER';
    const REGION_IL = 'IL';
    const REGION_IQ = 'IQ';
    const REGION_JO = 'JO';
    const REGION_KM = 'KM';
    const REGION_KW = 'KW';
    const REGION_LB = 'LB';
    const REGION_LY = 'LY';
    const REGION_MA = 'MA';
    const REGION_MR = 'MR';
    const REGION_OM = 'OM';
    const REGION_PS = 'PS';
    const REGION_QA = 'QA';
    const REGION_SA = 'SA';
    const REGION_SD = 'SD';
    const REGION_SO = 'SO';
    const REGION_SS = 'SS';
    const REGION_SY = 'SY';
    const REGION_TD = 'TD';
    const REGION_TN = 'TN';
    const REGION_YE = 'YE';
    const REGION_IN = 'IN';
    const REGION_TZ = 'TZ';
    const REGION_ES = 'ES';
    const REGION_AZ = 'AZ';
    const REGION_BY = 'BY';
    const REGION_ZM = 'ZM';
    const REGION_BG = 'BG';
    const REGION_ML = 'ML';
    const REGION_BD = 'BD';
    const REGION_CN = 'CN';
    const REGION_FR = 'FR';
    const REGION_BA = 'BA';
    const REGION_AD = 'AD';
    const REGION_IT = 'IT';
    const REGION_RU = 'RU';
    const REGION_PH = 'PH';
    const REGION_UG = 'UG';
    const REGION_US = 'US';
    const REGION_IR = 'IR';
    const REGION_CZ = 'CZ';
    const REGION_GB = 'GB';
    const REGION_DK = 'DK';
    const REGION_GL = 'GL';
    const REGION_KE = 'KE';
    const REGION_AT = 'AT';
    const REGION_BE = 'BE';
    const REGION_CH = 'CH';
    const REGION_DE = 'DE';
    const REGION_LI = 'LI';
    const REGION_LU = 'LU';
    const REGION_NE = 'NE';
    const REGION_SN = 'SN';
    const REGION_BT = 'BT';
    const REGION_TG = 'TG';
    const REGION_CY = 'CY';
    const REGION_GR = 'GR';
    const REGION_150 = '150';
    const REGION_AG = 'AG';
    const REGION_AI = 'AI';
    const REGION_AS = 'AS';
    const REGION_AU = 'AU';
    const REGION_BB = 'BB';
    const REGION_BI = 'BI';
    const REGION_BM = 'BM';
    const REGION_BS = 'BS';
    const REGION_BW = 'BW';
    const REGION_BZ = 'BZ';
    const REGION_CA = 'CA';
    const REGION_CC = 'CC';
    const REGION_CK = 'CK';
    const REGION_CX = 'CX';
    const REGION_DG = 'DG';
    const REGION_DM = 'DM';
    const REGION_FI = 'FI';
    const REGION_FJ = 'FJ';
    const REGION_FK = 'FK';
    const REGION_FM = 'FM';
    const REGION_GD = 'GD';
    const REGION_GG = 'GG';
    const REGION_GI = 'GI';
    const REGION_GM = 'GM';
    const REGION_GU = 'GU';
    const REGION_GY = 'GY';
    const REGION_HK = 'HK';
    const REGION_IE = 'IE';
    const REGION_IM = 'IM';
    const REGION_IO = 'IO';
    const REGION_JE = 'JE';
    const REGION_JM = 'JM';
    const REGION_KI = 'KI';
    const REGION_KN = 'KN';
    const REGION_KY = 'KY';
    const REGION_LC = 'LC';
    const REGION_LR = 'LR';
    const REGION_LS = 'LS';
    const REGION_MG = 'MG';
    const REGION_MH = 'MH';
    const REGION_MO = 'MO';
    const REGION_MP = 'MP';
    const REGION_MS = 'MS';
    const REGION_MT = 'MT';
    const REGION_MU = 'MU';
    const REGION_MW = 'MW';
    const REGION_MY = 'MY';
    const REGION_NF = 'NF';
    const REGION_NG = 'NG';
    const REGION_NL = 'NL';
    const REGION_NR = 'NR';
    const REGION_NU = 'NU';
    const REGION_NZ = 'NZ';
    const REGION_PG = 'PG';
    const REGION_PK = 'PK';
    const REGION_PN = 'PN';
    const REGION_PR = 'PR';
    const REGION_PW = 'PW';
    const REGION_RW = 'RW';
    const REGION_SB = 'SB';
    const REGION_SC = 'SC';
    const REGION_SE = 'SE';
    const REGION_SG = 'SG';
    const REGION_SH = 'SH';
    const REGION_SI = 'SI';
    const REGION_SL = 'SL';
    const REGION_SX = 'SX';
    const REGION_SZ = 'SZ';
    const REGION_TC = 'TC';
    const REGION_TK = 'TK';
    const REGION_TO = 'TO';
    const REGION_TT = 'TT';
    const REGION_TV = 'TV';
    const REGION_UM = 'UM';
    const REGION_VC = 'VC';
    const REGION_VG = 'VG';
    const REGION_VI = 'VI';
    const REGION_VU = 'VU';
    const REGION_WS = 'WS';
    const REGION_ZW = 'ZW';
    const REGION_419 = '419';
    const REGION_AR = 'AR';
    const REGION_BO = 'BO';
    const REGION_BR = 'BR';
    const REGION_CL = 'CL';
    const REGION_CO = 'CO';
    const REGION_CR = 'CR';
    const REGION_CU = 'CU';
    const REGION_DO = 'DO';
    const REGION_EA = 'EA';
    const REGION_EC = 'EC';
    const REGION_GQ = 'GQ';
    const REGION_GT = 'GT';
    const REGION_HN = 'HN';
    const REGION_IC = 'IC';
    const REGION_MX = 'MX';
    const REGION_NI = 'NI';
    const REGION_PA = 'PA';
    const REGION_PE = 'PE';
    const REGION_PY = 'PY';
    const REGION_SV = 'SV';
    const REGION_UY = 'UY';
    const REGION_VE = 'VE';
    const REGION_EE = 'EE';
    const REGION_AF = 'AF';
    const REGION_BF = 'BF';
    const REGION_GN = 'GN';
    const REGION_GW = 'GW';
    const REGION_FO = 'FO';
    const REGION_BJ = 'BJ';
    const REGION_BL = 'BL';
    const REGION_CD = 'CD';
    const REGION_CF = 'CF';
    const REGION_CG = 'CG';
    const REGION_CI = 'CI';
    const REGION_GA = 'GA';
    const REGION_GF = 'GF';
    const REGION_GP = 'GP';
    const REGION_HT = 'HT';
    const REGION_MC = 'MC';
    const REGION_MF = 'MF';
    const REGION_MQ = 'MQ';
    const REGION_NC = 'NC';
    const REGION_PF = 'PF';
    const REGION_PM = 'PM';
    const REGION_RE = 'RE';
    const REGION_WF = 'WF';
    const REGION_YT = 'YT';
    const REGION_HR = 'HR';
    const REGION_HU = 'HU';
    const REGION_AM = 'AM';
    const REGION_ID = 'ID';
    const REGION_IS = 'IS';
    const REGION_SM = 'SM';
    const REGION_VA = 'VA';
    const REGION_JP = 'JP';
    const REGION_GE = 'GE';
    const REGION_CV = 'CV';
    const REGION_KZ = 'KZ';
    const REGION_KH = 'KH';
    const REGION_KP = 'KP';
    const REGION_KR = 'KR';
    const REGION_TR = 'TR';
    const REGION_KG = 'KG';
    const REGION_AO = 'AO';
    const REGION_LA = 'LA';
    const REGION_LT = 'LT';
    const REGION_LV = 'LV';
    const REGION_MZ = 'MZ';
    const REGION_MK = 'MK';
    const REGION_MN = 'MN';
    const REGION_BN = 'BN';
    const REGION_MM = 'MM';
    const REGION_NO = 'NO';
    const REGION_SJ = 'SJ';
    const REGION_NP = 'NP';
    const REGION_AW = 'AW';
    const REGION_BQ = 'BQ';
    const REGION_CW = 'CW';
    const REGION_SR = 'SR';
    const REGION_PL = 'PL';
    const REGION_PT = 'PT';
    const REGION_ST = 'ST';
    const REGION_TL = 'TL';
    const REGION_MD = 'MD';
    const REGION_RO = 'RO';
    const REGION_UA = 'UA';
    const REGION_LK = 'LK';
    const REGION_SK = 'SK';
    const REGION_AL = 'AL';
    const REGION_XK = 'XK';
    const REGION_ME = 'ME';
    const REGION_RS = 'RS';
    const REGION_AX = 'AX';
    const REGION_TJ = 'TJ';
    const REGION_TH = 'TH';
    const REGION_TM = 'TM';
    const REGION_UZ = 'UZ';
    const REGION_VN = 'VN';
    const REGION_TW = 'TW';
}