<%@ page import ="java.sql.*" %>
<%@ page import ="javax.sql.*" %>
<%
if (!(request.getParameter("usr")==null || request.getParameter("usr").equals("")))
{
	String userid=request.getParameter("usr");
	String pwd = null;
	java.sql.Connection con = null;
	ResultSet rs = null;
	try{
		pwd=request.getParameter("pwd");
		Class.forName("com.mysql.jdbc.Driver");
		con = DriverManager.getConnection("jdbc:mysql://localhost:3306/library","root","");
	}catch(Exception e){ System.out.println(e);	}
	try{
		Statement st= con.createStatement();
		String query = "select userid, password from users where userid='"+userid+"'";
		//System.out.println(query);
		rs=st.executeQuery(query);
	}catch(Exception e) { System.out.println(e);	}
	if(rs.next())
	{
		if(rs.getString(2).equals(pwd))
		{
			//out.println("welcome "+userid);
			System.out.println(userid + " logged in");
			session.setAttribute("userid",userid);
			response.sendRedirect("welcome.jsp");
		}
		else
		{
			//out.println("Invalid password try again");
			response.sendRedirect("login.jsp");

		}
	}
	else
	{
		out.println("Invalid username try again");
	}
}
else
{
%>
<body>
<form action="login.jsp" method="post">

User name :<input type="text" name="usr" />
password :<input type="password" name="pwd" />
<input type="submit" />

</form>
</body>
<%
}
%>
