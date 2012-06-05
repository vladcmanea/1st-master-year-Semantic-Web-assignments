<?xml version="1.0" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:html="http://www.w3.org/1999/xhtml">
	<xsl:template match="html:html">
		<kml xmlns="http://www.opengis.net/kml/2.2">	
			<Document>
			<xsl:for-each select="html:body/html:article/html:section">
				<Placemark>
					<name><xsl:value-of select="html:header/html:h3" /></name>
					<description><xsl:value-of select="html:p" disable-output-escaping="no" /></description>
					<Point>
						<coordinates><xsl:value-of select="html:p/html:span/html:abbr[@class='longitude']/@title" />,<xsl:value-of select="html:p/html:span/html:abbr[@class='latitude']/@title" />,0</coordinates>
					</Point>
				</Placemark>
			</xsl:for-each>
			</Document>
		</kml>
	</xsl:template>
</xsl:stylesheet>