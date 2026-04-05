
When a user submits an email and clicks and "Add", the website sends a POST, then Laravel checks if what the user typed is a correctly formatted email address. Then, email is stored in session and looks at your current list to make sure that email isn't already there and that you haven't reached the 5-email limit. If everything is valid, it then saves the email to a temporary list and shows the updated list on your screen.

**1. What is the difference between GET and POST?**
The difference between GET and POST is that GET is the one that gets the data, or in other words fetch the data. It is limited in size of data. When using GET, the data is visible in the URL. It is used in search form
 and view user profile

POST is the one that sends the data, and can send large amount of data. When using POST, the data is not visible inside the URL and is hidden inside the request body. It is used in submitting forms, sending sensitive data and creating/updating data

**2. Why do we use @csrf in forms?**
@csrf is a security "handshake" between your browser and your Laravel app. It generates a hidden, unique token that proves the form was actually submitted from your website and not by a malicious hacker trying to trick your server. Without this token, Laravel will block the request to keep your app safe.

**3. What is session used for in this activity?**
In this activity, the Session acts as a temporary "memory" or a "clipboard." Since a website usually "forgets" who you are every time the page reloads, the session allows us to store your list of emails in the background so they stay visible even after you hit the "Add" or "Delete" buttons.

**4. What happens if the session is cleared?**
If the session is cleared (for example, if you close the browser or manually call session()->flush()), the "clipboard" is wiped clean. The next time you load the page, your list of 5 emails will be gone, and you will see the "No emails added yet" message.