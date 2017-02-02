<xsl:stylesheet version="2.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
xmlns:php="http://php.net/xsl"
exclude-result-prefixes="php"
xsl:extension-element-prefixes="php">

    <!--  xmlns:date="http://exslt.org/dates-and-times"
                extension-element-prefixes="date" -->


    <xsl:output
            method="html"
            encoding="UTF-8"
            doctype-public="-//W3C//DTD HTML 4.01//EN"
            doctype-system="http://www.w3.org/TR/html4/strict.dtd"
            indent="yes"  ></xsl:output>


    <xsl:template match="/">


                <table  class="table table-striped" border="1">

                <thead>
                    <tr>
                        <th>id</th>
                        <th>disponible</th>
                        <th>Total</th>

                    </tr>
                </thead>
                <tbody>
                <xsl:apply-templates select="station"/>



                </tbody>
                </table>

    </xsl:template>


    <xsl:template match="station">


                <tr>

                   <td>
                      <xsl:value-of select="$id"/>
                   </td>

                    <td>
                        <xsl:value-of select="./available"/>
                    </td>


                    <td>
                        <xsl:value-of select="./total"/>
                    </td>


                </tr>

    </xsl:template>




</xsl:stylesheet>
