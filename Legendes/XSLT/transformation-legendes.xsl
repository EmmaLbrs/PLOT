<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:xs="http://www.w3.org/2001/XMLSchema" exclude-result-prefixes="xs" version="2.0"
    xmlns:tei="http://www.tei-c.org/ns/1.0">

    <xsl:template match="tei:TEI">

        <xsl:result-document href="../HTML/{@xml:id}-txt.html" method="xhtml"
            doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"
            exclude-result-prefixes="xs tei" omit-xml-declaration="yes">

            <html>
                <head>
                    <meta charset="utf-8"/>
                    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
                    <meta name="viewport"
                        content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
                    <title>
                        <xsl:value-of select="tei:teiHeader/tei:fileDesc/tei:titleStmt/tei:title"/>
                    </title>
                    <link rel="stylesheet" href="../../css/general.css"/>
                    <link rel="stylesheet" href="../../css/legendes.css"/>
                </head>
                <body>
                    
                    <div class="navbar navbar-expand-lg navbar-fixed-top navbar-custom" id="myNavbar">
                        <div class="container">
                            <div class="navbar-header">
                                <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </a>
                                <a href="index.html" class="navbar-brand">PLOT</a>
                            </div>
                            
                            <div class="navbar-collapse collapse navbar-right">
                                <ul class="nav navbar-nav" role="navigation">
                                    <li class="nav-item"><a class="nav-link" href="index.html">Accueil</a></li>
                                    <li class="nav-item"><a class="nav-link" href="carte.html">Carte</a></li>
                                    <li class="dropdown nav-item">
                                        <a class="dropdown-toggle active" data-toggle="dropdown" href="legende.html">Légendes<span class="caret"></span> </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" class="nav-link active">Textes</a></li>
                                            <li><a href="#" class="nav-link">Audios</a></li>
                                            <li><a href="#" class="nav-link">Base de données iconographiques</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown nav-item">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">A propos<span class="caret"></span> </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" class="nav-link">Sources</a></li>
                                            <li><a href="#" class="nav-link">Le projet</a></li>
                                            <li><a href="#" class="nav-link">Contact</a></li>
                                        </ul>
                                    </li>          
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">

                        <header>
                            <xsl:apply-templates
                                select="tei:text/tei:body/tei:sp/tei:p[@xml:id = 'titre']"/>
                        </header>

                        <div id="texte-legende">
                            <xsl:for-each select="tei:text/tei:body/tei:sp/tei:p">
                                <xsl:apply-templates select=".[not(@xml:id) or @xml:id != 'titre']"
                                />
                            </xsl:for-each>
                            <xsl:element name="a">
                                <xsl:attribute name="href">
                                    <xsl:text>../PDF/</xsl:text>
                                    <xsl:value-of select="./@xml:id"/>
                                    <xsl:text>.pdf</xsl:text>
                                </xsl:attribute>
                                <xsl:attribute name="download">
                                    <xsl:value-of select="./@xml:id"/>
                                </xsl:attribute>
                                Télécharger le fichier en PDF
                            </xsl:element>
                        </div>
                        

                        <div id="perso-legende">
                            <h3>Personnages</h3>
                            <xsl:for-each
                                select="tei:teiHeader/tei:fileDesc/tei:sourceDesc/tei:listPerson/tei:person">
                                <xsl:apply-templates select="."/>
                            </xsl:for-each>
                        </div>

                        <footer class="row">
                            <div class="col-md-6">
                                <p>
                                    <a href="#" class="underline--magical">Sources</a><br/>
                                    <a href="#">Nous contacter</a><br/>
                                    Mentions légales -- Centre d'Etudes Supérieures de la Renaissance -- 2020
                                </p>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-offset-6 col-md-3 logo-footer">
                                        <img src="../../images/logos/logo_cesr.gif" class="img-responsive" alt="Logo du CESR"/>
                                    </div>
                                    <div class="col-md-3 logo-footer">
                                        <img src="../../images/logos/logo_univ_tours.png" class="img-responsive" alt="Logo de l'Université de Tours" />
                                    </div>
                                </div>
                            </div>
                        </footer>


                    </div>


                </body>

            </html>
        </xsl:result-document>


        <xsl:result-document href="../HTML/{@xml:id}-carte.php" method="xhtml"
            omit-xml-declaration="yes">

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
                    <link rel="stylesheet"
                        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"/>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"/>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"/>

                </head>
                <body>


                    <div id="texte-legende">
                        <header>
                            <xsl:apply-templates
                                select="tei:text/tei:body/tei:sp/tei:p[@xml:id = 'titre']"/>
                        </header>

                        <xsl:for-each select="tei:text/tei:body/tei:sp/tei:p">
                            <xsl:apply-templates select=".[not(@xml:id) or @xml:id != 'titre']"/>
                        </xsl:for-each>
                    </div>

                    <div id="autour-legende">

                        <div id="contexte-leg">
                            <h2>Contexte</h2>
                            <xsl:for-each select="tei:text/tei:front/tei:set/tei:p">
                                <p>
                                    <xsl:value-of select="."/>
                                </p>
                            </xsl:for-each>
                        </div>

                        <div id="perso-legende">
                            <h2>Personnages</h2>
                            <xsl:for-each
                                select="tei:teiHeader/tei:fileDesc/tei:sourceDesc/tei:listPerson/tei:person">
                                <xsl:apply-templates select="."/>
                            </xsl:for-each>
                        </div>

                    </div>





                </body>

            </html>


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
                <xsl:choose>
                    <xsl:when test="name() = 'persName'">
                        <xsl:element name="a">
                            <xsl:attribute name="href">
                                <xsl:text>cible_requete.php?personnage_id=</xsl:text>
                                <xsl:value-of select="../@xml:id"/></xsl:attribute>
                            <xsl:value-of select="."/>
                        </xsl:element>
                    </xsl:when>
                    <xsl:otherwise>
                        <xsl:value-of select="."/>
                    </xsl:otherwise>
                </xsl:choose>
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
