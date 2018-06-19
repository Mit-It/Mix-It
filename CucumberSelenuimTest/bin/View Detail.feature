@web
Feature: View Detail
	As a webapplication user
	In order to view Cocktails the User needs to open the Detailed view
	
	Scenario: open Detail page
	Given User is on Listpage
	When User clicks on Caipiriha
	Then User should be shown the Title
	And a descrition
	And the recipe
	
#	Scenario: use Picture slider working
#	Given User is on Caipiriha page
#	When User clicks on Arrow Right
#	Then User should be shown the next picture
	
#	Scenario: use Picture slider not working
#	Given User opened Detail page of "TestCocktail2"
#	When User clicks on "Arrow Right"
#	Then User should not be shown a new Picture