import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class MyServlet
 */
@WebServlet("/MyServlet")
public class MyServlet extends HttpServlet {
	private static final long		serialVersionUID	= 1L;
	static String			url							= "jdbc:mysql://ec2jfay.ddns.net:3306/myMovies";
	static String			user						= "newremoteuser";
	static String			password					= "password";
	static Connection		connection					= null;

	public MyServlet() {
        super();
    }

	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {

		response.setContentType("text/html;charset=UTF-8");
		response.getWriter().println("-------- MySQL JDBC Connection Testing ------------<br>");
		try {
			Class.forName("com.mysql.jdbc.Driver");
		} catch (ClassNotFoundException e) {
			System.out.println("Where is your MySQL JDBC Driver?");
			e.printStackTrace();
			return;
		}
		connection = null;
		try {
			connection = DriverManager.getConnection(url, user, password);
		} catch (SQLException e) {
			System.out.println("Connection Failed! Check output console");
			e.printStackTrace();
			return;
		}
		if (connection != null) {
			response.getWriter().println("You made it, take control your database now!<br>");
		} else {
			System.out.println("Failed to make connection!");
		}
		try {
			String selectSQL = "SELECT * FROM movieTable WHERE TITLE LIKE ?";
			String theUserName = "user%";
			response.getWriter().println(selectSQL + "<br>");
			response.getWriter().println("------------------------------------------<br>");
			PreparedStatement preparedStatement = connection.prepareStatement(selectSQL);
			preparedStatement.setString(1, theUserName);
			ResultSet rs = preparedStatement.executeQuery();
			while (rs.next()) {
				String id = rs.getString("ID");
				String movie = rs.getString("TITLE");
				String director = rs.getString("DIRECTOR");
				String year = rs.getString("RELEASEDATE");
				String rating = rs.getString("RATING");
				response.getWriter().append("USER ID: '" + id + ",' ");
				response.getWriter().append("USER NAME: '" + movie + ",' ");
				response.getWriter().append("USER EMAIL: '" + director + ",' ");
				response.getWriter().append("USER PHONE: '" + year + ",'");
				response.getWriter().append("USER ID: '" + rating + "'<br>");
			}
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}


	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		doGet(request, response);
	}
}