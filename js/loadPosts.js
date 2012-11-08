// JavaScript Document

//****************** This should be on an external file on the server *****************************
var post=[]
post[0]={
	title:"Book for sale", 
	postername:"DJAnders",
	description:"I have a book for sale: Green Eggs and Ham.",
	contactphone:"(248)-555-1234", 
	contactemail:"djanders@oakland.edu", 
	askingprice:"$12.00"}
	
post[1]={
	title:"Taco Truck Help", 
	postername:"Scott",
	description:"I need someone to write a database for indexing taco trucks.",
	contactphone:"(248)-555-1243", 
	contactemail:"spoconno@oakland.edu", 
	askingprice:"$20.00"}
	
post[2]={
	title:"Dinner with Isaac", 
	postername:"Isaac",
	description:"Hey ladies, I am looking for a good time.",
	contactphone:"(248)-555-4321", 
	contactemail:"Isaac@oakland.edu", 
	askingprice:"$0.00"}
	
post[3]={
	title:"Found 64G Flash Drive", 
	postername:"DJAnders",
	description:"I found a red 64 gig flash drive in hhs 123 at 5:00pm last thursday.",
	contactphone:"(248)-555-1234", 
	contactemail:"djanders@oakland.edu", 
	askingprice:""}
	
//***********************************************

element = document.getElementById("posts").innerHTML=listPosts();

function listPosts(){
	this.document.write("<table width=90% border=1 align=center cellpadding=2 cellspacing=0 bordercolor=#003300 >");//creates the table 
	this.document.write("<tr><td colspan=6>Current Posts</td></tr>");//creates the title panel
	this.document.write("<tr><td>PostTitle</td><td>PosterName</td><td>Description</td><td>ContactPhone</td><td>ContactEmail</td><td>AskingPrice</td></tr>");
	//this will control the individual objects
	for(var i=0; i<post.length; i++){//fill the table based on how many posts are on the system
	
		this.document.write("<tr>");
		this.document.write("<td>"+post[i].title+"</td>");
		this.document.write("<td>"+post[i].postername+"</td>");
		this.document.write("<td>"+post[i].description+"</td>");
		this.document.write("<td>"+post[i].contactphone+"</td>");
		this.document.write("<td>"+post[i].contactemail+"</td>");
		this.document.write("<td>"+post[i].askingprice+"</td>");
		this.document.write("</tr>");
		
	}
	this.document.write("</table>");//make sure you end the table element
	
	
	
}