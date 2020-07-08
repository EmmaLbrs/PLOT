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
                        <xsl:text>PLOT - CESR | </xsl:text>
                        <xsl:value-of select="tei:teiHeader/tei:fileDesc/tei:titleStmt/tei:title"/>
                    </title>
                    <link rel="stylesheet" href="../../css/general.css"/>
                    <link rel="stylesheet" href="../../css/legendes.css"/>
                </head>
                <body>

                    <div class="navbar navbar-expand-lg navbar-fixed-top navbar-custom"
                        id="myNavbar">
                        <div class="container">
                            <div class="navbar-header">
                                <a class="navbar-toggle" data-toggle="collapse"
                                    data-target=".navbar-collapse">
                                    <span class="icon-bar"/>
                                    <span class="icon-bar"/>
                                    <span class="icon-bar"/>
                                </a>
                                <a href="../../index.html" class="navbar-brand">
                                    <img src="../../images/logos/logo_plot_couleur_recadre.png"
                                        alt="logo de PLOT"/>
                                </a>
                            </div>

                            <div class="navbar-collapse collapse navbar-right">
                                <ul class="nav navbar-nav" role="navigation">
                                    <li class="nav-item">
                                        <a class="nav-link" href="../../index.html">Accueil</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../../carte.html">Carte</a>
                                    </li>
                                    <li class="dropdown nav-item">
                                        <a class="dropdown-toggle active" data-toggle="dropdown"
                                            href="../../legende.html">Légendes<span class="caret"/>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="../../textes.php" class="nav-link active"
                                                  >Textes</a>
                                            </li>
                                            <li>
                                                <a href="../../audios.php" class="nav-link"
                                                  >Audios</a>
                                            </li>
                                            <li>
                                                <a href="#" class="nav-link">Base de données
                                                  iconographiques</a>
                                            </li>
                                            <li>
                                                <a href="../../acces.php" class="nav-link">Accès
                                                  thématiques</a>
                                            </li>

                                        </ul>
                                    </li>
                                    <li class="dropdown nav-item">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">A
                                                propos<span class="caret"/>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="../../sources.html" class="nav-link"
                                                  >Sources</a>
                                            </li>
                                            <li>
                                                <a href="../../leprojet.html" class="nav-link">Le
                                                  projet</a>
                                            </li>
                                            <li>
                                                <a href="../../contact.php" class="nav-link"
                                                  >Contact</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">

                        <div class="fil_ariane">
                            <p><a href="../../index.html">PLOT</a> > <a href="../../legende.html"
                                    >Légendes</a> > <a href="../../textes.php">Textes</a> >
                                    <xsl:element name="a">
                                    <xsl:attribute name="href"> # </xsl:attribute>
                                    <xsl:value-of
                                        select="tei:text/tei:body/tei:sp/tei:p[@xml:id = 'titre']"/>
                                </xsl:element></p>
                        </div>

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


                        <div id="perso-legende">
                            <h3>Personnages</h3>
                            <xsl:for-each
                                select="tei:teiHeader/tei:fileDesc/tei:sourceDesc/tei:listPerson/tei:*">
                                <xsl:apply-templates select="." mode="texte"/>
                            </xsl:for-each>
                        </div>

                        <div id="liens-telechargement">
                            <ul>
                                <li>
                                    <xsl:element name="a">
                                        <xsl:attribute name="href">
                                            <xsl:text>../PDF/</xsl:text>
                                            <xsl:value-of select="./@xml:id"/>
                                            <xsl:text>.pdf</xsl:text>
                                        </xsl:attribute>
                                        <xsl:attribute name="download">
                                            <xsl:value-of select="./@xml:id"/>
                                        </xsl:attribute> Télécharger le fichier en PDF
                                    </xsl:element>
                                </li>
                                <li>
                                    <xsl:element name="a">
                                        <xsl:attribute name="href">
                                            <xsl:text>../TEI/</xsl:text>
                                            <xsl:value-of select="./@xml:id"/>
                                            <xsl:text>.xml</xsl:text>
                                        </xsl:attribute>
                                        <xsl:attribute name="download">
                                            <xsl:value-of select="./@xml:id"/>
                                        </xsl:attribute> Télécharger le fichier en XML
                                    </xsl:element>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <footer class="row">
                        <div class="col-md-6">
                            <p>
                                <a href="../../sources.html">Sources</a><br/>
                                <a href="../../contact.php">Nous contacter</a><br/> Mentions légales
                                -- Centre d'Etudes Supérieures de la Renaissance -- 2020 </p>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-offset-6 col-md-3 logo-footer">
                                    <a href="https://cesr.cnrs.fr/">
                                        <img src="../../images/logos/logo_cesr.gif"
                                            class="img-responsive" alt="Logo du CESR"/>
                                    </a>
                                </div>
                                <div class="col-md-3 logo-footer">
                                    <a href="https://www.univ-tours.fr/">
                                        <img src="../../images/logos/logo_univ_tours.png"
                                            class="img-responsive"
                                            alt="Logo de l'Université de Tours"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </footer>



                    <script type="text/javascript" src="../../bootstrap/js/jquery-3.4.1.js"/>
                    <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"/>

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

                    <div id="audio-legende">


                        <xsl:element name="audio">
                            <xsl:attribute name="controls"/>
                            <xsl:element name="source">
                                <xsl:attribute name="src">
                                    <xsl:text>Legendes/Audio/</xsl:text>
                                    <xsl:value-of select="@xml:id"/>
                                    <xsl:text>.mp3</xsl:text>
                                </xsl:attribute>
                            </xsl:element>

                        </xsl:element>
                    </div>


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
                                select="tei:teiHeader/tei:fileDesc/tei:sourceDesc/tei:listPerson/*">
                                <xsl:apply-templates select="." mode="carte"/>
                            </xsl:for-each>
                        </div>

                    </div>





                </body>

            </html>


        </xsl:result-document>
    </xsl:template>

    <xsl:template match="tei:persName | tei:name">
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

    <xsl:template match="tei:person | tei:personGrp" mode="carte">

        <xsl:element name="ul">
            <xsl:attribute name="id">
                <xsl:value-of select="./@xml:id"/>
            </xsl:attribute>
            <xsl:for-each select="*">
                <xsl:choose>
                    <xsl:when test="name() = 'persName' or name() = 'name'">
                        <xsl:element name="a">
                            <xsl:attribute name="href">
                                <xsl:text>cible_requete.php?personnage_id=</xsl:text>
                                <xsl:value-of select="../@xml:id"/>
                            </xsl:attribute>
                            <xsl:value-of select="."/>
                        </xsl:element>
                    </xsl:when>
                    <xsl:otherwise>
                        <xsl:choose>
                            <xsl:when test="name() = 'birth'">
                                <xsl:if test="tei:date">
                                    <li>Date de naissance : <xsl:value-of select="tei:date"/></li>
                                </xsl:if>
                                <xsl:if test="tei:placeName">
                                    <li>Lieu de naissance : <xsl:value-of select="tei:placeName"
                                        /></li>
                                </xsl:if>
                            </xsl:when>
                            <xsl:when test="name() = 'death'">
                                <xsl:if test="tei:date">
                                    <li>Date de décès : <xsl:value-of select="tei:date"/></li>
                                </xsl:if>
                                <xsl:if test="tei:placeName">
                                    <li>Lieu de décès : <xsl:value-of select="tei:placeName"/></li>
                                </xsl:if>
                            </xsl:when>
                            <xsl:when test="name() = 'occupation'">
                                <li>Occupation : <xsl:apply-templates/></li>
                            </xsl:when>
                            <xsl:otherwise>
                                <li>
                                    <xsl:apply-templates/>
                                </li>
                            </xsl:otherwise>
                        </xsl:choose>
                    </xsl:otherwise>
                </xsl:choose>

            </xsl:for-each>
            <br/>
        </xsl:element>
    </xsl:template>

    <xsl:template match="tei:person | tei:personGrp" mode="texte">
        <xsl:element name="p">
            <xsl:attribute name="id">
                <xsl:value-of select="./@xml:id"/>
            </xsl:attribute>
            <xsl:for-each select="*">
                <xsl:choose>
                    <xsl:when test="name() = 'persName' or name() = 'name'">
                        <xsl:element name="a">
                            <xsl:attribute name="href">
                                <xsl:text>../../cible_requete.php?personnage_id=</xsl:text>
                                <xsl:value-of select="../@xml:id"/>
                            </xsl:attribute>
                            <xsl:value-of select="."/>
                        </xsl:element>
                    </xsl:when>
                    <xsl:otherwise>
                        <xsl:choose>
                            <xsl:when test="name() = 'birth'">
                                <xsl:if test="tei:date">
                                    <li>Date de naissance : <xsl:value-of select="tei:date"/></li>
                                </xsl:if>
                                <xsl:if test="tei:placeName">
                                    <li>Lieu de naissance : <xsl:value-of select="tei:placeName"
                                        /></li>
                                </xsl:if>
                            </xsl:when>
                            <xsl:when test="name() = 'death'">
                                <xsl:if test="tei:date">
                                    <li>Date de décès : <xsl:value-of select="tei:date"/></li>
                                </xsl:if>
                                <xsl:if test="tei:placeName">
                                    <li>Lieu de décès : <xsl:value-of select="tei:placeName"/></li>
                                </xsl:if>
                            </xsl:when>
                            <xsl:when test="name() = 'occupation'">
                                <li>Occupation : <xsl:apply-templates/></li>
                            </xsl:when>
                            <xsl:otherwise>
                                <li>
                                    <xsl:apply-templates/>
                                </li>
                            </xsl:otherwise>
                        </xsl:choose>
                    </xsl:otherwise>
                </xsl:choose>
            </xsl:for-each>
            <br/>
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

    <xsl:template match="tei:note">
        <!--        <xsl:element name="span">
            <xsl:attribute name="class">infobulle</xsl:attribute>
            <span><xsl:apply-templates/></span>
            <xsl:text>(explication)</xsl:text>
        </xsl:element>-->
        <xsl:element name="span">
            <xsl:attribute name="class">infobulle</xsl:attribute>
            <xsl:attribute name="data-tooltip">
                <xsl:apply-templates/>
            </xsl:attribute>
            <xsl:text>(explication)</xsl:text>
        </xsl:element>
    </xsl:template>


</xsl:stylesheet>
