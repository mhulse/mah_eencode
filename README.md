## About:

Convert all applicable characters to HTML entities.

-----

## Requirements:

* ExpressionEngine 2.0
* PHP 5.2.3 or greater

-----

## Parameters:

* "protect"
    
    Default: Existing html entities will not be encoded.
    
    Set to "yes" and everything will be converted.    
    
    Not applicable when parameter "decode" is set to "yes".

* "decode"
    
    Set to "yes" to convert all HTML entities to their applicable characters.

-----

## Usage example:

    {exp:mah_eencode}&amp;{/exp:mah_eencode}
    Output: &amp;amp;

    {exp:mah_eencode protect="yes"}&amp;{/exp:mah_eencode}
    Output: &amp;

    {exp:mah_eencode protect="yes"}&amp;&{/exp:mah_eencode}
    &amp;&amp;

    {exp:mah_eencode}&{/exp:mah_eencode}
    Output: &amp;

    {exp:mah_eencode decode="yes"}&amp;{/exp:mah_eencode}
    Output: &

    {exp:mah_eencode decode="yes"}&amp;amp;{/exp:mah_eencode}
    Output: &amp;

-----

## Changelog:

Version 1.0
******************
2010/11/28: Initial public release.
