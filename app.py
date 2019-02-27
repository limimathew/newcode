from flask import Flask

app=Flask(__name__)

@app.route("/")
def index():
    return "<h1>hello...........</h1>"

@app.route("/home")
def home():
    return "MY HOME PAGE......"

@app.route("/about")
def about():
    return "about my views"

@app.route("/contact")
def contact():
    return "contact us"


if(__name__=="__main__"):
    app.run(debug=True)

