<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Enum;

enum Locale: string
{
    case AF_ZA = 'af_ZA';
    case AM_ET = 'am_ET';
    case AR_AE = 'ar_AE';
    case AR_BH = 'ar_BH';
    case AR_DZ = 'ar_DZ';
    case AR_EG = 'ar_EG';
    case AR_IQ = 'ar_IQ';
    case AR_JO = 'ar_JO';
    case AR_KW = 'ar_KW';
    case AR_LB = 'ar_LB';
    case AR_LY = 'ar_LY';
    case AR_MA = 'ar_MA';
    case AR_OM = 'ar_OM';
    case AR_QA = 'ar_QA';
    case AR_SA = 'ar_SA';
    case AR_SD = 'ar_SD';
    case AR_SY = 'ar_SY';
    case AR_TN = 'ar_TN';
    case AR_YE = 'ar_YE';
    case BE_BY = 'be_BY';
    case BG_BG = 'bg_BG';
    case BN_BD = 'bn_BD';
    case BN_IN = 'bn_IN';
    case CA_ES = 'ca_ES';
    case CS_CZ = 'cs_CZ';
    case CY_GB = 'cy_GB';
    case DA_DK = 'da_DK';
    case DE_AT = 'de_AT';
    case DE_BE = 'de_BE';
    case DE_CH = 'de_CH';
    case DE_DE = 'de_DE';
    case DE_LI = 'de_LI';
    case DE_LU = 'de_LU';
    case EL_CY = 'el_CY';
    case EL_GR = 'el_GR';
    case EN_AU = 'en_AU';
    case EN_BW = 'en_BW';
    case EN_CA = 'en_CA';
    case EN_GB = 'en_GB';
    case EN_HK = 'en_HK';
    case EN_IE = 'en_IE';
    case EN_IN = 'en_IN';
    case EN_JM = 'en_JM';
    case EN_MH = 'en_MH';
    case EN_MT = 'en_MT';
    case EN_NA = 'en_NA';
    case EN_NZ = 'en_NZ';
    case EN_PH = 'en_PH';
    case EN_PK = 'en_PK';
    case EN_SG = 'en_SG';
    case EN_TT = 'en_TT';
    case EN_US = 'en_US';
    case EN_ZA = 'en_ZA';
    case EN_ZW = 'en_ZW';
    case ES_AR = 'es_AR';
    case ES_BO = 'es_BO';
    case ES_CL = 'es_CL';
    case ES_CO = 'es_CO';
    case ES_CR = 'es_CR';
    case ES_DO = 'es_DO';
    case ES_EC = 'es_EC';
    case ES_ES = 'es_ES';
    case ES_GT = 'es_GT';
    case ES_HN = 'es_HN';
    case ES_MX = 'es_MX';
    case ES_NI = 'es_NI';
    case ES_PA = 'es_PA';
    case ES_PE = 'es_PE';
    case ES_PR = 'es_PR';
    case ES_PY = 'es_PY';
    case ES_SV = 'es_SV';
    case ES_US = 'es_US';
    case ES_UY = 'es_UY';
    case ES_VE = 'es_VE';
    case ET_EE = 'et_EE';
    case EU_ES = 'eu_ES';
    case FA_IR = 'fa_IR';
    case FI_FI = 'fi_FI';
    case FO_FO = 'fo_FO';
    case FR_BE = 'fr_BE';
    case FR_CA = 'fr_CA';
    case FR_CH = 'fr_CH';
    case FR_FR = 'fr_FR';
    case FR_LU = 'fr_LU';
    case GA_IE = 'ga_IE';
    case GL_ES = 'gl_ES';
    case HE_IL = 'he_IL';
    case HI_IN = 'hi_IN';
    case HR_HR = 'hr_HR';
    case HU_HU = 'hu_HU';
    case HY_AM = 'hy_AM';
    case ID_ID = 'id_ID';
    case IS_IS = 'is_IS';
    case IT_CH = 'it_CH';
    case IT_IT = 'it_IT';
    case JA_JP = 'ja_JP';
    case KA_GE = 'ka_GE';
    case KK_KZ = 'kk_KZ';
    case KM_KH = 'km_KH';
    case KN_IN = 'kn_IN';
    case KO_KR = 'ko_KR';
    case KY_KG = 'ky_KG';
    case LO_LA = 'lo_LA';
    case LT_LT = 'lt_LT';
    case LV_LV = 'lv_LV';
    case MI_NZ = 'mi_NZ';
    case MK_MK = 'mk_MK';
    case MN_MN = 'mn_MN';
    case MR_IN = 'mr_IN';
    case MS_BN = 'ms_BN';
    case MS_MY = 'ms_MY';
    case MT_MT = 'mt_MT';
    case NB_NO = 'nb_NO';
    case NE_NP = 'ne_NP';
    case NL_BE = 'nl_BE';
    case NL_NL = 'nl_NL';
    case NN_NO = 'nn_NO';
    case OR_IN = 'or_IN';
    case PA_IN = 'pa_IN';
    case PL_PL = 'pl_PL';
    case PS_AF = 'ps_AF';
    case PT_BR = 'pt_BR';
    case PT_PT = 'pt_PT';
    case RO_RO = 'ro_RO';
    case RU_RU = 'ru_RU';
    case RW_RW = 'rw_RW';
    case SI_LK = 'si_LK';
    case SK_SK = 'sk_SK';
    case SL_SI = 'sl_SI';
    case SQ_AL = 'sq_AL';
    case SR_RS = 'sr_RS';
    case SV_SE = 'sv_SE';
    case SW_KE = 'sw_KE';
    case TA_IN = 'ta_IN';
    case TE_IN = 'te_IN';
    case TH_TH = 'th_TH';
    case TI_ET = 'ti_ET';
    case TR_TR = 'tr_TR';
    case UK_UA = 'uk_UA';
    case UR_PK = 'ur_PK';
    case VI_VN = 'vi_VN';
    case ZH_CN = 'zh_CN';
    case ZH_HK = 'zh_HK';
    case ZH_TW = 'zh_TW';

    public function getName(): string
    {
        return match ($this) {
            self::AF_ZA => 'Afrikaans (South Africa)',
            self::AM_ET => 'Amharic (Ethiopia)',
            self::AR_AE => 'Arabic (U.A.E.)',
            self::AR_BH => 'Arabic (Bahrain)',
            self::AR_DZ => 'Arabic (Algeria)',
            self::AR_EG => 'Arabic (Egypt)',
            self::AR_IQ => 'Arabic (Iraq)',
            self::AR_JO => 'Arabic (Jordan)',
            self::AR_KW => 'Arabic (Kuwait)',
            self::AR_LB => 'Arabic (Lebanon)',
            self::AR_LY => 'Arabic (Libya)',
            self::AR_MA => 'Arabic (Morocco)',
            self::AR_OM => 'Arabic (Oman)',
            self::AR_QA => 'Arabic (Qatar)',
            self::AR_SA => 'Arabic (Saudi Arabia)',
            self::AR_SD => 'Arabic (Sudan)',
            self::AR_SY => 'Arabic (Syria)',
            self::AR_TN => 'Arabic (Tunisia)',
            self::AR_YE => 'Arabic (Yemen)',
            self::BE_BY => 'Belarusian (Belarus)',
            self::BG_BG => 'Bulgarian (Bulgaria)',
            self::BN_BD => 'Bengali (Bangladesh)',
            self::BN_IN => 'Bengali (India)',
            self::CA_ES => 'Catalan (Spain)',
            self::CS_CZ => 'Czech (Czech Republic)',
            self::CY_GB => 'Welsh (United Kingdom)',
            self::DA_DK => 'Danish (Denmark)',
            self::DE_AT => 'German (Austria)',
            self::DE_BE => 'German (Belgium)',
            self::DE_CH => 'German (Switzerland)',
            self::DE_DE => 'German (Germany)',
            self::DE_LI => 'German (Liechtenstein)',
            self::DE_LU => 'German (Luxembourg)',
            self::EL_CY => 'Greek (Cyprus)',
            self::EL_GR => 'Greek (Greece)',
            self::EN_AU => 'English (Australia)',
            self::EN_BW => 'English (Botswana)',
            self::EN_CA => 'English (Canada)',
            self::EN_GB => 'English (United Kingdom)',
            self::EN_HK => 'English (Hong Kong)',
            self::EN_IE => 'English (Ireland)',
            self::EN_IN => 'English (India)',
            self::EN_JM => 'English (Jamaica)',
            self::EN_MH => 'English (Marshall Islands)',
            self::EN_MT => 'English (Malta)',
            self::EN_NA => 'English (Namibia)',
            self::EN_NZ => 'English (New Zealand)',
            self::EN_PH => 'English (Philippines)',
            self::EN_PK => 'English (Pakistan)',
            self::EN_SG => 'English (Singapore)',
            self::EN_TT => 'English (Trinidad & Tobago)',
            self::EN_US => 'English (United States)',
            self::EN_ZA => 'English (South Africa)',
            self::EN_ZW => 'English (Zimbabwe)',
            self::ES_AR => 'Spanish (Argentina)',
            self::ES_BO => 'Spanish (Bolivia)',
            self::ES_CL => 'Spanish (Chile)',
            self::ES_CO => 'Spanish (Colombia)',
            self::ES_CR => 'Spanish (Costa Rica)',
            self::ES_DO => 'Spanish (Dominican Republic)',
            self::ES_EC => 'Spanish (Ecuador)',
            self::ES_ES => 'Spanish (Spain)',
            self::ES_GT => 'Spanish (Guatemala)',
            self::ES_HN => 'Spanish (Honduras)',
            self::ES_MX => 'Spanish (Mexico)',
            self::ES_NI => 'Spanish (Nicaragua)',
            self::ES_PA => 'Spanish (Panama)',
            self::ES_PE => 'Spanish (Peru)',
            self::ES_PR => 'Spanish (Puerto Rico)',
            self::ES_PY => 'Spanish (Paraguay)',
            self::ES_SV => 'Spanish (El Salvador)',
            self::ES_US => 'Spanish (United States)',
            self::ES_UY => 'Spanish (Uruguay)',
            self::ES_VE => 'Spanish (Venezuela)',
            self::ET_EE => 'Estonian (Estonia)',
            self::EU_ES => 'Basque (Spain)',
            self::FA_IR => 'Persian (Iran)',
            self::FI_FI => 'Finnish (Finland)',
            self::FO_FO => 'Faroese (Faroe Islands)',
            self::FR_BE => 'French (Belgium)',
            self::FR_CA => 'French (Canada)',
            self::FR_CH => 'French (Switzerland)',
            self::FR_FR => 'French (France)',
            self::FR_LU => 'French (Luxembourg)',
            self::GA_IE => 'Irish (Ireland)',
            self::GL_ES => 'Galician (Spain)',
            self::HE_IL => 'Hebrew (Israel)',
            self::HI_IN => 'Hindi (India)',
            self::HR_HR => 'Croatian (Croatia)',
            self::HU_HU => 'Hungarian (Hungary)',
            self::HY_AM => 'Armenian (Armenia)',
            self::ID_ID => 'Indonesian (Indonesia)',
            self::IS_IS => 'Icelandic (Iceland)',
            self::IT_CH => 'Italian (Switzerland)',
            self::IT_IT => 'Italian (Italy)',
            self::JA_JP => 'Japanese (Japan)',
            self::KA_GE => 'Georgian (Georgia)',
            self::KK_KZ => 'Kazakh (Kazakhstan)',
            self::KM_KH => 'Khmer (Cambodia)',
            self::KN_IN => 'Kannada (India)',
            self::KO_KR => 'Korean (South Korea)',
            self::KY_KG => 'Kyrgyz (Kyrgyzstan)',
            self::LO_LA => 'Lao (Laos)',
            self::LT_LT => 'Lithuanian (Lithuania)',
            self::LV_LV => 'Latvian (Latvia)',
            self::MI_NZ => 'Maori (New Zealand)',
            self::MK_MK => 'Macedonian (North Macedonia)',
            self::MN_MN => 'Mongolian (Mongolia)',
            self::MR_IN => 'Marathi (India)',
            self::MS_BN => 'Malay (Brunei)',
            self::MS_MY => 'Malay (Malaysia)',
            self::MT_MT => 'Maltese (Malta)',
            self::NB_NO => 'Norwegian Bokmål (Norway)',
            self::NE_NP => 'Nepali (Nepal)',
            self::NL_BE => 'Dutch (Belgium)',
            self::NL_NL => 'Dutch (Netherlands)',
            self::NN_NO => 'Norwegian Nynorsk (Norway)',
            self::OR_IN => 'Odia (India)',
            self::PA_IN => 'Punjabi (India)',
            self::PL_PL => 'Polish (Poland)',
            self::PS_AF => 'Pashto (Afghanistan)',
            self::PT_BR => 'Portuguese (Brazil)',
            self::PT_PT => 'Portuguese (Portugal)',
            self::RO_RO => 'Romanian (Romania)',
            self::RU_RU => 'Russian (Russia)',
            self::RW_RW => 'Kinyarwanda (Rwanda)',
            self::SI_LK => 'Sinhala (Sri Lanka)',
            self::SK_SK => 'Slovak (Slovakia)',
            self::SL_SI => 'Slovenian (Slovenia)',
            self::SQ_AL => 'Albanian (Albania)',
            self::SR_RS => 'Serbian (Serbia)',
            self::SV_SE => 'Swedish (Sweden)',
            self::SW_KE => 'Swahili (Kenya)',
            self::TA_IN => 'Tamil (India)',
            self::TE_IN => 'Telugu (India)',
            self::TH_TH => 'Thai (Thailand)',
            self::TI_ET => 'Tigrinya (Ethiopia)',
            self::TR_TR => 'Turkish (Turkey)',
            self::UK_UA => 'Ukrainian (Ukraine)',
            self::UR_PK => 'Urdu (Pakistan)',
            self::VI_VN => 'Vietnamese (Vietnam)',
            self::ZH_CN => 'Chinese (China)',
            self::ZH_HK => 'Chinese (Hong Kong)',
            self::ZH_TW => 'Chinese (Taiwan)',
        };
    }
}