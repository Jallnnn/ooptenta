$(function() {

	$(".play").click(function(){
		var playerName = $('.charName').val();
		var playerClass = ($("input[type='radio']:checked").val());
		$.ajax({
			url:"start_game.php",
			dataType:"json",
			data: {
				playerName: playerName,
				playerClass: playerClass
			},
			success: function(data) {

				$(".characterInfo").hide();
				for (var i = 0; i < data.length; i++) {
					for (var j = 0; j < data[i].length; j++) {


						$(".selectNewChallenge").append("<h2>Welcome " + data[i][j].name + " to the League of Legends game!");
						$(".selectNewChallenge").append("<p>Choose your challenge by accepting or hit pick new challenge if you want to do another challenge</p>");
						$(".selectNewChallenge").append("<button class='accept_challenge'>Accept challenge</button>");
						$(".selectNewChallenge").append("<button class='pick_new_challenge'>I want a new challenge");

						$(".pick_new_challenge").on("click", pickNewChallenge);
						$(".accept_challenge").on("click", acceptChallenge);
						console.log("YAY! stored in database", data);
					}
				}
			},
			error: function(data) {
				console.log("Hey! Something went wrong here!", data);
			}
		});
	});

		function acceptChallenge() {
			
		}

		function pickNewChallenge() {

			$.ajax({
				url: "get_challenges.php",
				dataType: "json",
				data: {
					latestChallenge: 1
				},
				success: function(data) {
					$(".random").html("");
					$(".selectNewChallenge").append("<p class='random'>" + data.description + "</p>");
					
					$(".selectNewChallenge").append("<p class='random'>Attackspeed: " + data.skills.attackspeed + "</p>");
					$(".selectNewChallenge").append("<p class='random'>Abiltypower: " + data.skills.abilitypower + "</p>");
					$(".selectNewChallenge").append("<p class='random'>Attackdamage: " + data.skills.attackdamage + "</p>");
					$(".selectNewChallenge").append("<p class='random'>Armor: " + data.skills.armor + "</p>");
				},
				error: function(data) {
					console.log("It didnt work!", data.responseText);
				}
		
			});
		}

	$(".reset").click(function(){
		$.ajax({
			url:"reset.php",
			dataType:"json",
			data: {
				startOver: 1
			},
			success: function(data){
				$(".charName").val("");
				$("input:radio").attr("checked", false);
				console.log("YAY! you have reset the game!");
			},
			error: function(data) {
				console.log("Hey! You did not reset the game!", data);
			}
		});
	});

});