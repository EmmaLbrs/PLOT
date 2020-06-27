<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:xs="http://www.w3.org/2001/XMLSchema" exclude-result-prefixes="xs" version="2.0"
    xmlns:tei="http://www.tei-c.org/ns/1.0">

    <xsl:template match="tei:TEI">

        <xsl:result-document href="../HTML/{@xml:id}-txt.html" method="xhtml"
            doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"
            exclude-result-prefixes="xs tei">

            <html>
                <head>
                    <meta charset="utf-8"/>
                    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
                    <meta name="viewport"
                        content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
                    <title>
                        <xsl:value-of select="tei:teiHeader/tei:fileDesc/tei:titleStmt/tei:title"/>
                    </title>
                    <!--<link rel="stylesheet" href="../HTML/CSS/style.css"/>-->
                </head>
                <body>

                    <div class="container">

                        <header>
                            <xsl:apply-templates
                                select="tei:text/tei:body/tei:sp/tei:p[@xml:id = 'titre']"/>
                        </header>

                        <div id="texte-legende">
                            <xsl:for-each select="tei:text/tei:body/tei:sp/tei:p">
                                <xsl:apply-templates select=".[not(@xml:id) or @xml:id != 'titre']"
                                />
                            </xsl:for-each>
                        </div>

                        <div class="perso-legendes">
                            <xsl:for-each
                                select="tei:teiHeader/tei:fileDesc/tei:sourceDesc/tei:listPerson/tei:person">
                                <xsl:apply-templates select="."/>
                            </xsl:for-each>
                        </div>
                        

                    </div>


                </body>

            </html>
        </xsl:result-document>


        <xsl:result-document href="../HTML/{@xml:id}-carte.php" method="xhtml">
         
                <html>
                    <head>
                        <meta charset="utf-8"/>
                        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
                        <meta name="viewport"
                            content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
                        <title>
                            <xsl:value-of select="tei:teiHeader/tei:fileDesc/tei:titleStmt/tei:title"/>
                        </title>
                        <!--<link rel="stylesheet" href="../HTML/CSS/style.css"/>-->
                        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"/>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
                    </head>
                    <body>
                        
    
                            <div id="texte-legende">
                                <header>
                                    <xsl:apply-templates
                                        select="tei:text/tei:body/tei:sp/tei:p[@xml:id = 'titre']"/>
                                </header>
                                
                                <xsl:for-each select="tei:text/tei:body/tei:sp/tei:p">
                                    <xsl:apply-templates select=".[not(@xml:id) or @xml:id != 'titre']"
                                    />
                                </xsl:for-each>
                            </div>
                        
                            <div id="autour-legende">
                                <div id="perso-legendes">
                                    <xsl:for-each
                                        select="tei:teiHeader/tei:fileDesc/tei:sourceDesc/tei:listPerson/tei:person">
                                        <xsl:apply-templates select="."/>
                                    </xsl:for-each>
                                </div>
                            </div>

                        
                        
                        
                    </body>
                    
                </html>
            
                <!--<xsl:processing-instruction name="php">echo 'Hello World';</xsl:processing-instruction>-->
            
        </xsl:result-document>
    </xsl:template>
    
    <xsl:template match="tei:persName">
        <xsl:element name="a">
            <xsl:attribute name="href">
                <xsl:value-of select="./@ref"/>
            </xsl:attribute>
            <xsl:attribute name="goto">
                <xsl:text>autour-legende</xsl:text>
            </xsl:attribute>
            <xsl:apply-templates/>
        </xsl:element>
    </xsl:template>
    
    <xsl:template match="tei:person">
        <xsl:element name="p">
            <xsl:attribute name="id">
                <xsl:value-of select="./@xml:id"/>
            </xsl:attribute>
            <xsl:for-each select="*">
                <xsl:value-of select="."/>
                <br/>
            </xsl:for-each>
        </xsl:element>
    </xsl:template>

    <xsl:template match="tei:p">
        <xsl:choose>
            <xsl:when test=".[@xml:id = 'titre']">
                <h2>
                    <xsl:apply-templates/>
                </h2>
            </xsl:when>
            <xsl:otherwise>
                <p>
                    <xsl:apply-templates/>
                </p>
            </xsl:otherwise>
        </xsl:choose>

    </xsl:template>


</xsl:stylesheet>
