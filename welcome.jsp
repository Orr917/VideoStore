<%@ page import ="java.sql.*" %>
<%@ page import ="javax.sql.*" %>
<%

	String userid=(String)session.getAttribute("userid");
	if(userid == null)
		response.sendRedirect("index.jsp");
	else
{
%>

<html>
<head></head>
<body>
<h1> Welcome to the application </h1>
<ul>
<li> Search </li>
<li> Borrow </li>
<li> Reserve </li>
<li> Check Fine </li>
<li> See items checked out </li>
<li> Quit </li>
<ul>
</body>
</html
<%
}
%>
