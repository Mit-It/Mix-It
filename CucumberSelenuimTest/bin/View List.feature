@web
Feature: View List
	As a webapplication user
	In order to find Cocktails the User needs to open the List page
	The user can also use search filters
	
	If the user provides a non valid filter he will be
	shown a message "No Cocktail found"
	
	Scenario: open List page
	Given User is on homepage
	When User clicks on "Cocktails"
	Then User should be shown the Cocktails
	
	Scenario: use valid filter
	Given User is on Listpage2
	When User enters "TestCocktail"
	Then User should be shown the recipe(s) for "TestCocktail"
#	
#	Scenario: use invalid filter
#	Given User is on "View List"
#	When User enters "XYZ@@@Test"
#	Then User should be shown an message "No Cocktail found"
	
	