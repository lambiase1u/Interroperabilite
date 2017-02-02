<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:output
            method="html"
            encoding="UTF-8"
            doctype-public="-//W3C//DTD HTML 4.01//EN"
            doctype-system="http://www.w3.org/TR/html4/strict.dtd"
            indent="yes" ></xsl:output>

    <xsl:template match="/">
        <html>
            <head >
                <style>
                    .aime{color:red;}
                </style>
            </head>
            <body>
                <xsl:apply-templates />
            </body>
        </html>
    </xsl:template>

    <xsl:template match="query">
        <table style="width:800px" border="1">
            <tbody>
                <tr>
                    <th>lat</th>
                    <th>long</th>
                </tr>

               <tr>
                   <td><xsl:value-of select="lat"/></td>
                   <td><xsl:value-of select="lon"/></td>
               </tr>
            </tbody>
        </table>
    </xsl:template>

</xsl:stylesheet>