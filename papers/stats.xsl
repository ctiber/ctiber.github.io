<?xml version="1.0" encoding="iso-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html>
<head>
<title>Visiteurs de ma page perso</title>
</head>
<body>
<center>
<h2>Visiteurs de la page Web</h2>
<table border="2">
<th>IP Address</th>
<th>Host Name</th>
<th>Date</th>
<th>Time</th>
<xsl:for-each select="entries/entry">
<tr>
<td><xsl:value-of select="address"/></td>
<td><xsl:value-of select="host"/></td>
<td><xsl:value-of select="date"/></td>
<td><xsl:value-of select="hour"/></td>
</tr>
</xsl:for-each>
</table>
</center>
</body>
</html>
</xsl:template>
</xsl:stylesheet>
