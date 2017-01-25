<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output
        method="html"
      encoding="UTF-8"
      doctype-public="-//W3C//DTD HTML 4.01//EN"
    doctype-system="http://www.w3.org/TR/html4/strict.dtd"
      indent="yes" ></xsl:output>

      <xsl:strip-space elements="FILMS"/>


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

      <xsl:template match="FILMS">
        <table style="width:800px" border="1">
          <tbody>
            <tr>
              <th>N°</th>
              <th>Titre</th>
              <th>Réalisateur</th>
              <th>Pays</th>
              <th>Genre</th>
              <th>Durée</th>
              <th>Affiche</th>
              <th>Critique(Ils ont aimé)</th>
            </tr>

          <xsl:apply-templates />
        </tbody>
        </table>
      </xsl:template>




      <xsl:template match="Film">
          <tr>
            <td>
              <xsl:value-of select="position()"/>
            </td>
            <td>
              <b><xsl:value-of select="Titre"/></b>
            </td>
            <td>
                <xsl:apply-templates select="Realisateur" />
            </td>
            <td>
              <xsl:value-of select="Pays"/>
            </td>
            <td>
              <xsl:value-of select="Genre"/>
            </td>
            <td>
              <xsl:value-of select="Duree"/>
            </td>
            <td>

              <xsl:element name="img" style="style">
                <xsl:attribute name="src"><xsl:value-of select="./@Affiche"/></xsl:attribute>
                <xsl:attribute name="style"><xsl:value-of select="'width:70px;'"/></xsl:attribute>
              </xsl:element>
            </td>

            <td>



              <xsl:element name="a" >

                  <xsl:attribute name="href">https://members.loria.fr/YBoniface/html/xml/file/critiques.html#<xsl:value-of select="./@ID"/></xsl:attribute>
                  Lire les critiques


              </xsl:element>

              <xsl:apply-templates select="Critique" />


            </td>

          </tr>
      </xsl:template>

      <xsl:template match="Realisateur/Nom">
          <strong><xsl:apply-templates/></strong>
      </xsl:template>

      <xsl:template match="Critique">
        <xsl:if test="Note > 2">
          <div class="aime">
            <xsl:value-of select="./Media"/>
          </div>
        </xsl:if>



      </xsl:template>





</xsl:stylesheet>
