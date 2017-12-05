@web
Feature: View Detail
	As a webapplication user
	In order to view Cocktails the User needs to open the Detailed view
	
	Scenario: open Detail page
	Given User searched for "Caipiriniha"
	When User clicks on "Show Details"
	Then User should be shown the Title
	And a descrition
	And the ingredients
	And the recipe
	
	Scenario: use Picture slider working
	Given User opened Detail page of "Caipiriniha"
	When User clicks on "Arrow Right"
	Then User should be shown the next picture
	
	Scenario: use Picture slider not working
	Given User opened Detail page of "TestCocktail"
	When User clicks on "Arrow Right"
	Then User should not be shown a new Picture
	
	