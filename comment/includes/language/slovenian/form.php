<?php
/*
Copyright © 2009-2014 Commentics Development Team [commentics.org]
License: GNU General Public License v3.0
		 http://www.commentics.org/license/

This file is part of Commentics.

Commentics is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Commentics is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Commentics. If not, see <http://www.gnu.org/licenses/>.

Text to help preserve UTF-8 file encoding: 汉语漢語.
*/

if (!isset($cmtx_path)) { die('Access Denied.'); }

/* Anchors */
cmtx_define('CMTX_ANCHOR_FORM', '#cmtx_form');

/* Heading */
cmtx_define('CMTX_FORM_HEADING', 'Dodajte komentar');

/* Form disabled messages */
cmtx_define('CMTX_ALL_FORMS_DISABLED', 'Dodajanje komentarjev je onemogočeno.');
cmtx_define('CMTX_THIS_FORM_DISABLED', 'Na tej strani je dodajanje komentarjev onemogočeno.');

/* Open form link */
cmtx_define('CMTX_OPEN_FORM', 'Prikaz obrazca');
cmtx_define('CMTX_OPEN_FORM_TITLE', 'Click to open the form');

/* JavaScript disabled message */
cmtx_define('CMTX_JAVASCRIPT_DISABLED', 'Pozor: nekatere storitve so na razpolago le ob vključenem JavaScript-u.');

/* Reply */
cmtx_define('CMTX_REPLY_MESSAGE', 'Odgovarjate na');
cmtx_define('CMTX_REPLY_CANCEL', '[preklic]');
cmtx_define('CMTX_REPLY_CANCEL_TITLE', 'Cancel this reply');
cmtx_define('CMTX_REPLY_NOBODY', 'Ne odgovarjate nikomur.');

/* Required */
cmtx_define('CMTX_REQUIRED_SYMBOL', '*');
cmtx_define('CMTX_REQUIRED_SYMBOL_MESSAGE', CMTX_REQUIRED_SYMBOL . ' Zahtevan podatek');

/* Field labels */
cmtx_define('CMTX_LABEL_NAME', 'Ime:');
cmtx_define('CMTX_LABEL_EMAIL', 'E-pošta:');
cmtx_define('CMTX_LABEL_WEBSITE', 'Web:');
cmtx_define('CMTX_LABEL_TOWN', 'Mesto:');
cmtx_define('CMTX_LABEL_COUNTRY', 'Država:');
cmtx_define('CMTX_LABEL_RATING', 'Ocena:');
cmtx_define('CMTX_LABEL_COMMENT', 'Komentar:');
cmtx_define('CMTX_LABEL_QUESTION', 'Vprašanje:');
cmtx_define('CMTX_LABEL_CAPTCHA', 'Captcha:');

/* Field titles */
cmtx_define('CMTX_TITLE_NAME', 'Vpišite ime');
cmtx_define('CMTX_TITLE_EMAIL', 'Vpišite e-naslov');
cmtx_define('CMTX_TITLE_WEBSITE', 'Vpišite spletno stran');
cmtx_define('CMTX_TITLE_TOWN', 'Vpišite mesto');
cmtx_define('CMTX_TITLE_COMMENT', 'Vpišite komentar');
cmtx_define('CMTX_TITLE_QUESTION', 'Odgovorite na vprašanje');
cmtx_define('CMTX_TITLE_NOTIFY', 'Želim prejemati e-poštna obvestila');
cmtx_define('CMTX_TITLE_REMEMBER', 'Pomnjenje v obrazec vnešenenih podatkov');
cmtx_define('CMTX_TITLE_PRIVACY', 'Strinjam se s politiko zasebnosti');
cmtx_define('CMTX_TITLE_TERMS', 'Strinjam se s pogoji uporabe');
cmtx_define('CMTX_TITLE_SUBMIT', 'Dodajte komentar');
cmtx_define('CMTX_TITLE_PREVIEW', 'Predogled');

/* Field placeholders */
cmtx_define('CMTX_PLACEHOLDER_NAME', '');
cmtx_define('CMTX_PLACEHOLDER_EMAIL', '');
cmtx_define('CMTX_PLACEHOLDER_WEBSITE', '');
cmtx_define('CMTX_PLACEHOLDER_TOWN', '');
cmtx_define('CMTX_PLACEHOLDER_COMMENT', '');
cmtx_define('CMTX_PLACEHOLDER_QUESTION', '');
cmtx_define('CMTX_PLACEHOLDER_CAPTCHA', '');

/* Note displayed after email field */
cmtx_define('CMTX_NOTE_EMAIL', '(ne bo objavljeno)');

/* BB Code tags */
cmtx_define('CMTX_BB_CODE_TAG_BOLD_1', '[B]');
cmtx_define('CMTX_BB_CODE_TAG_BOLD_2', '[/B]');
cmtx_define('CMTX_BB_CODE_TAG_ITALIC_1', '[I]');
cmtx_define('CMTX_BB_CODE_TAG_ITALIC_2', '[/I]');
cmtx_define('CMTX_BB_CODE_TAG_UNDERLINE_1', '[U]');
cmtx_define('CMTX_BB_CODE_TAG_UNDERLINE_2', '[/U]');
cmtx_define('CMTX_BB_CODE_TAG_STRIKE_1', '[STRIKE]');
cmtx_define('CMTX_BB_CODE_TAG_STRIKE_2', '[/STRIKE]');
cmtx_define('CMTX_BB_CODE_TAG_SUPERSCRIPT_1', '[SUPERSCRIPT]');
cmtx_define('CMTX_BB_CODE_TAG_SUPERSCRIPT_2', '[/SUPERSCRIPT]');
cmtx_define('CMTX_BB_CODE_TAG_SUBSCRIPT_1', '[SUBSCRIPT]');
cmtx_define('CMTX_BB_CODE_TAG_SUBSCRIPT_2', '[/SUBSCRIPT]');
cmtx_define('CMTX_BB_CODE_TAG_CODE_1', '[CODE]');
cmtx_define('CMTX_BB_CODE_TAG_CODE_2', '[/CODE]');
cmtx_define('CMTX_BB_CODE_TAG_PHP_1', '[PHP]');
cmtx_define('CMTX_BB_CODE_TAG_PHP_2', '[/PHP]');
cmtx_define('CMTX_BB_CODE_TAG_QUOTE_1', '[QUOTE]');
cmtx_define('CMTX_BB_CODE_TAG_QUOTE_2', '[/QUOTE]');
cmtx_define('CMTX_BB_CODE_TAG_LINE', '[LINE]');
cmtx_define('CMTX_BB_CODE_TAG_BULLET_1', '[BULLET]');
cmtx_define('CMTX_BB_CODE_TAG_BULLET_2', '[/BULLET]');
cmtx_define('CMTX_BB_CODE_TAG_NUMERIC_1', '[NUMERIC]');
cmtx_define('CMTX_BB_CODE_TAG_NUMERIC_2', '[/NUMERIC]');
cmtx_define('CMTX_BB_CODE_TAG_ITEM_1', '[ITEM]');
cmtx_define('CMTX_BB_CODE_TAG_ITEM_2', '[/ITEM]');
cmtx_define('CMTX_BB_CODE_TAG_LINK_1', '[LINK]');
cmtx_define('CMTX_BB_CODE_TAG_LINK_2', '[LINK=');
cmtx_define('CMTX_BB_CODE_TAG_LINK_3', ']');
cmtx_define('CMTX_BB_CODE_TAG_LINK_4', '[/LINK]');
cmtx_define('CMTX_BB_CODE_TAG_EMAIL_1', '[EMAIL]');
cmtx_define('CMTX_BB_CODE_TAG_EMAIL_2', '[EMAIL=');
cmtx_define('CMTX_BB_CODE_TAG_EMAIL_3', ']');
cmtx_define('CMTX_BB_CODE_TAG_EMAIL_4', '[/EMAIL]');
cmtx_define('CMTX_BB_CODE_TAG_IMAGE_1', '[IMAGE]');
cmtx_define('CMTX_BB_CODE_TAG_IMAGE_2', '[/IMAGE]');
cmtx_define('CMTX_BB_CODE_TAG_VIDEO_1', '[VIDEO]');
cmtx_define('CMTX_BB_CODE_TAG_VIDEO_2', '[/VIDEO]');

/* BB Code titles */
cmtx_define('CMTX_BB_CODE_TITLE_BOLD', 'Bold');
cmtx_define('CMTX_BB_CODE_TITLE_ITALIC', 'Italic');
cmtx_define('CMTX_BB_CODE_TITLE_UNDERLINE', 'Underline');
cmtx_define('CMTX_BB_CODE_TITLE_STRIKE', 'Strike');
cmtx_define('CMTX_BB_CODE_TITLE_SUPERSCRIPT', 'Superscript');
cmtx_define('CMTX_BB_CODE_TITLE_SUBSCRIPT', 'Subscript');
cmtx_define('CMTX_BB_CODE_TITLE_CODE', 'Code');
cmtx_define('CMTX_BB_CODE_TITLE_PHP', 'PHP');
cmtx_define('CMTX_BB_CODE_TITLE_QUOTE', 'Quote');
cmtx_define('CMTX_BB_CODE_TITLE_LINE', 'Insert line');
cmtx_define('CMTX_BB_CODE_TITLE_BULLET', 'Insert bullet list');
cmtx_define('CMTX_BB_CODE_TITLE_NUMERIC', 'Insert numeric list');
cmtx_define('CMTX_BB_CODE_TITLE_LINK', 'Insert web link');
cmtx_define('CMTX_BB_CODE_TITLE_EMAIL', 'Insert email link');
cmtx_define('CMTX_BB_CODE_TITLE_IMAGE', 'Insert image');
cmtx_define('CMTX_BB_CODE_TITLE_VIDEO', 'Insert video');

/* Smiley tags */
cmtx_define('CMTX_SMILEY_TAG_SMILE', ':smile:');
cmtx_define('CMTX_SMILEY_TAG_SAD', ':sad:');
cmtx_define('CMTX_SMILEY_TAG_HUH', ':huh:');
cmtx_define('CMTX_SMILEY_TAG_LAUGH', ':laugh:');
cmtx_define('CMTX_SMILEY_TAG_MAD', ':mad:');
cmtx_define('CMTX_SMILEY_TAG_TONGUE', ':tongue:');
cmtx_define('CMTX_SMILEY_TAG_CRYING', ':crying:');
cmtx_define('CMTX_SMILEY_TAG_GRIN', ':grin:');
cmtx_define('CMTX_SMILEY_TAG_WINK', ':wink:');
cmtx_define('CMTX_SMILEY_TAG_SCARED', ':scared:');
cmtx_define('CMTX_SMILEY_TAG_COOL', ':cool:');
cmtx_define('CMTX_SMILEY_TAG_SLEEP', ':sleep:');
cmtx_define('CMTX_SMILEY_TAG_BLUSH', ':blush:');
cmtx_define('CMTX_SMILEY_TAG_UNSURE', ':unsure:');
cmtx_define('CMTX_SMILEY_TAG_SHOCKED', ':shocked:');

/* Smiley titles */
cmtx_define('CMTX_SMILEY_TITLE_SMILE', 'Smile');
cmtx_define('CMTX_SMILEY_TITLE_SAD', 'Sad');
cmtx_define('CMTX_SMILEY_TITLE_HUH', 'Huh');
cmtx_define('CMTX_SMILEY_TITLE_LAUGH', 'Laugh');
cmtx_define('CMTX_SMILEY_TITLE_MAD', 'Mad');
cmtx_define('CMTX_SMILEY_TITLE_TONGUE', 'Tongue');
cmtx_define('CMTX_SMILEY_TITLE_CRYING', 'Crying');
cmtx_define('CMTX_SMILEY_TITLE_GRIN', 'Grin');
cmtx_define('CMTX_SMILEY_TITLE_WINK', 'Wink');
cmtx_define('CMTX_SMILEY_TITLE_SCARED', 'Scared');
cmtx_define('CMTX_SMILEY_TITLE_COOL', 'Cool');
cmtx_define('CMTX_SMILEY_TITLE_SLEEP', 'Sleep');
cmtx_define('CMTX_SMILEY_TITLE_BLUSH', 'Blush');
cmtx_define('CMTX_SMILEY_TITLE_UNSURE', 'Unsure');
cmtx_define('CMTX_SMILEY_TITLE_SHOCKED', 'Shocked');

/* Text displayed for BB Code bullet dialog */
cmtx_define('CMTX_BULLET_DIALOG_HEADING', 'Insert Bullet List');
cmtx_define('CMTX_BULLET_DIALOG_CONTENT_1', 'Please enter at least one item.');
cmtx_define('CMTX_BULLET_DIALOG_CONTENT_2', 'Item:');
cmtx_define('CMTX_BULLET_DIALOG_INSERT', 'Insert');
cmtx_define('CMTX_BULLET_DIALOG_CANCEL', 'Cancel');

/* Text displayed for BB Code numeric dialog */
cmtx_define('CMTX_NUMERIC_DIALOG_HEADING', 'Insert Numeric List');
cmtx_define('CMTX_NUMERIC_DIALOG_CONTENT_1', 'Please enter at least one item.');
cmtx_define('CMTX_NUMERIC_DIALOG_CONTENT_2', 'Item:');
cmtx_define('CMTX_NUMERIC_DIALOG_INSERT', 'Insert');
cmtx_define('CMTX_NUMERIC_DIALOG_CANCEL', 'Cancel');

/* Text displayed for BB Code link dialog */
cmtx_define('CMTX_LINK_DIALOG_HEADING', 'Insert Link');
cmtx_define('CMTX_LINK_DIALOG_CONTENT_1', 'Please enter the link of the website');
cmtx_define('CMTX_LINK_DIALOG_CONTENT_2', 'Optionally you can add display text');
cmtx_define('CMTX_LINK_DIALOG_INSERT', 'Insert');
cmtx_define('CMTX_LINK_DIALOG_CANCEL', 'Cancel');

/* Text displayed for BB Code email dialog */
cmtx_define('CMTX_EMAIL_DIALOG_HEADING', 'Insert Email');
cmtx_define('CMTX_EMAIL_DIALOG_CONTENT_1', 'Please enter the email address');
cmtx_define('CMTX_EMAIL_DIALOG_CONTENT_2', 'Optionally add any display text');
cmtx_define('CMTX_EMAIL_DIALOG_INSERT', 'Insert');
cmtx_define('CMTX_EMAIL_DIALOG_CANCEL', 'Cancel');

/* Text displayed for BB Code image dialog */
cmtx_define('CMTX_IMAGE_DIALOG_HEADING', 'Insert Image');
cmtx_define('CMTX_IMAGE_DIALOG_CONTENT', 'Please enter the link of the image');
cmtx_define('CMTX_IMAGE_DIALOG_INSERT', 'Insert');
cmtx_define('CMTX_IMAGE_DIALOG_CANCEL', 'Cancel');

/* Text displayed for BB Code video dialog */
cmtx_define('CMTX_VIDEO_DIALOG_HEADING', 'Insert Video');
cmtx_define('CMTX_VIDEO_DIALOG_CONTENT_1', 'Please enter the link of the video. Supports');
cmtx_define('CMTX_VIDEO_DIALOG_CONTENT_2', 'YouTube, Vimeo, MetaCafe and Dailymotion.');
cmtx_define('CMTX_VIDEO_DIALOG_INSERT', 'Insert');
cmtx_define('CMTX_VIDEO_DIALOG_CANCEL', 'Cancel');

/* Text displayed before/after the counter */
cmtx_define('CMTX_TEXT_COUNTER', '%s');

/* Text displayed before question field */
cmtx_define('CMTX_TEXT_QUESTION', 'Vnesite odgovor:');

/* Text displayed for Securimage captcha */
cmtx_define('CMTX_TEXT_SECURIMAGE', 'Vnesite kodo:');
cmtx_define('CMTX_TITLE_SECURIMAGE', 'Vnesite kodo s slike');
cmtx_define('CMTX_TITLE_SECURIMAGE_AUDIO', 'Zvok');
cmtx_define('CMTX_TITLE_SECURIMAGE_REFRESH', 'Osveži');

/* Text displayed if ReCaptcha key missing */
cmtx_define('CMTX_RECAPTCHA_NO_KEY', 'API ključ manjka! Vnesite ga na Admin strani');

/* Text displayed after notify checkbox */
cmtx_define('CMTX_TEXT_NOTIFY', 'Obveščajte me o novih komentarjih po e-pošti.');

/* Text displayed after remember checkbox */
cmtx_define('CMTX_TEXT_REMEMBER', 'Zapomni si moje podatke na tem računalniku.');

/* Text displayed after privacy checkbox */
cmtx_define('CMTX_PRIVACY_TEXT', 'I have read and understand the %s.');
cmtx_define('CMTX_PRIVACY_LINK', 'privacy policy');
cmtx_define('CMTX_PRIVACY_LINK_TITLE', 'View the privacy policy');

/* Text displayed after terms checkbox */
cmtx_define('CMTX_TERMS_TEXT', 'I have read and agree to the %s.');
cmtx_define('CMTX_TERMS_LINK', 'terms and conditions');
cmtx_define('CMTX_TERMS_LINK_TITLE', 'View the terms and conditions');

/* Text for form submit button */
cmtx_define('CMTX_SUBMIT_BUTTON', 'Nov komentar');

/* Text for form preview button */
cmtx_define('CMTX_PREVIEW_BUTTON', 'Predogled');

/* Text for form buttons when processing */
cmtx_define('CMTX_PROCESSING_BUTTON', 'Prosimo počakajte ...');

/* Text for parsing information */
cmtx_define('CMTX_TEXT_PARSING', 'Generated in %s seconds');
cmtx_define('CMTX_TEXT_QUERIES', 'Queries');

/* Text for 'powered by' statement */
cmtx_define('CMTX_POWERED_BY', 'Storitev omogoča');

?>