$('document').ready(function(){

	//Funktion für das Mischen der Fragen für die Gemischten AUfgaben
    function shuffle(o){
        for(var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
        return o;
    }


	//Variablendeklaration
	var rid = $("#rid").text(),
		rightid = $("#rid").text(),
		answers = 0,
		toggled = true,
		count = 1;


	//Funktion für die Downloads der Komplexen Aufgaben
	function get_downloads(dl){
		$("#collapseDownloads").collapse("toggle");
		$("#collapseDownloads div").load("result.php #dl", {"dl": dl, "count": count});

	}


	//Funktion zum mischen der Fragen
    if(cat == "Gemischt") {
        var b = false;
        $.ajax({
            url: 'result.php',
            data: {rnd: rnd, counter: -1, id: id},
            type: 'post',
            dataType: 'html',
            async: false,
            success: function (output) {

                var aa = $("<div>").html(output).find("#rid").text();
                aa = aa.replace(first_id + ",", "");
                aa = aa.substr(0, aa.length - 1);
                aa = aa.split(",");

                aa = shuffle(aa);
                aa = aa.toString();
                b = aa;

                cat =  $("<div>").html(output).find("#cat").text();
                type = $("<div>").html(output).find("#type").text();
            }
        });

    }
	
	//NEU AB NOVEMBER 2018
	function calculation(eingabe){
		//PARSER FUNKTION
		return parseInt(eingabe);
	}

	//Funktion wenn auf den Lösen-Button geklickt wird
	$("#loesen").click(function(e){
		
		e.preventDefault();
		
		var loesung = $("#eingabe").val();
		
		if(type == "IEPrinzip" || type == "Binomial" || type == "Hypergeo"){
			//NEU AB NOVEMBER 2018
			var richtigeLoesung = dynamischeFragen[-1 + count]['loesung'][0];		//Theoretisch gibt es mehrere Lösungswege
			var loesungsZahl = calculation(loesung);
			//answers += parseInt($("<div>").html(output).find( "#answer" ).text());
			
			var select_answer = "";
			//Loesung prüfen
			if(richtigeLoesung == loesungsZahl){
				//Richtig
				select_answer += "Deine Antwort " + loesung + " (" + loesungsZahl + ") ist richtig!";
				answers += 1;
			} else {
				//Falsch
				select_answer += "Deine Antwort " + loesung + " (" + loesungsZahl + ") ist leider falsch.<br> Die richtige Antwort lautet " + richtigeLoesung + ".";
			}
								
			$("#form_aufgabe").fadeOut("slow", function(){
				$(this).css("display", "none");
				
				$("#ab").fadeIn(6, function(){
					$(this).html(select_answer);
				});
			});
			
		} else {
			get_downloads(rightid);

			$.ajax({ url: 'result.php',
				data: {bla: loesung, rightid: rightid, type: type, cat: cat, lid: b},
				type: 'post',
				dataType: 'html',
				success: function(output) {
					var select_answer = $("<div>").html(output).find( "#ra" );
					answers += parseInt($("<div>").html(output).find( "#answer" ).text());
										
					$("#form_aufgabe").fadeOut("slow", function(){
						$(this).css("display", "none");
						
						$("#ab").fadeIn(6, function(){
							$(this).html(select_answer);
						});
					});
				}
			});
		}
	});

	//Funktion zum Laden der nächsten Frage
	$("#next").click(function(e){

		e.preventDefault();

		if(type == "IEPrinzip" || type == "Binomial" || type == "Hypergeo"){
			//NEU AB NOVEMBER 2018
			if(typeof dynamischeFragen !== 'undefined' && dynamischeFragen != null){
				//Kein Fehler ==> Lade nächste Frage

				var select_question = dynamischeFragen[count]['fragetext'];
				//var select_tips = $("<div>").html(output).find( "#tips").text();
				//select_tips = select_tips.substr(0,select_tips.lastIndexOf(";"));
				//select_tips = select_tips.split(";");
				//var select_tips_content = $("<div>").html(output).find( "#tips_content" ).text();
				//rightid = $("<div>").html(output).find( "#rid" ).text();

				//var img = $("<div>").html(output).find( "#img" ).text();
				
				//Ausblenden der Frage
				$("#lernmodusfrage .container").effect('slide', { direction: 'left', mode: 'hide' }, 800, function(){

					$("#q").empty().append(select_question);
					/*
					$("#tip").attr("data-content", select_tips[0]);
					$("#tt-text-next").empty();
					for(var i = 1; i < select_tips.length; i++){
						$("#tt-text-next").append("<span id='tt"+i+"'>"+select_tips[i]+"</span>");
					}
					$("#ttc").empty().html(select_tips_content);
					*/

					//Slide in der neuen Frage
					$("#lernmodusfrage .container").effect('slide', { direction: 'right', mode: 'show' }, 800);
					
				});
				
				$("#ab").fadeOut("slow", function(){
					$(this).css("display", "none");
					
					$("#form_aufgabe").fadeIn(6, function(){					
						$("#eingabe").val('');
					});
				});

				count++;
				if(count == $("#max").text()){
					$("#next").remove();
					$(".next").html("<button id='finished'>Auswerten</button>");
					$("#finished").bind("click", function(){	
						var url = 'lernmodus.php?finished=1';
						var form = $('<form action="' + url + '" method="post">' +
									  '<input type="hidden" name="answers" value="'+answers+'" />' +
									  '<input type="hidden" name="max" value="'+count+'" />' +
									  '</form>');
						$('body').append(form);
						form.submit();
					});
				}
					
				$("#qnr").html(count);

				$("#collapseDownloads").collapse('hide');
				$("#collapseDownloads div").text("");
			} else {
				alert("Leider ist ein Fehler aufgetreten!");
			}			
		} else {
			$.ajax({url: 'result.php',
				data: {next: true, counter: count, type: type, cat: cat, rid: b},
				type: 'post',
				dataType: 'html',
				success: function(output) {
					b = $("<div>").html(output).find( "#rnd").text();

					if(cat == "Gemischt") {
						cat = $("<div>").html(output).find( "#cat" );
						type = $("<div>").html(output).find( "#type" );
					}


					var select_question = $("<div>").html(output).find( "#question" );
					var select_tips = $("<div>").html(output).find( "#tips").text();
					select_tips = select_tips.substr(0,select_tips.lastIndexOf(";"));
					select_tips = select_tips.split(";");
					var select_tips_content = $("<div>").html(output).find( "#tips_content" ).text();
					rightid = $("<div>").html(output).find( "#rid" ).text();

					var img = $("<div>").html(output).find( "#img" ).text();

					//Ausblenden der Frage
					$("#lernmodusfrage .container").effect('slide', { direction: 'left', mode: 'hide' }, 800, function(){

						$("#q").empty().append(select_question);
						$("#tip").attr("data-content", select_tips[0]);
						$("#tt-text-next").empty();
						for(var i = 1; i < select_tips.length; i++){
							$("#tt-text-next").append("<span id='tt"+i+"'>"+select_tips[i]+"</span>");
						}
						$("#ttc").empty().html(select_tips_content);

						//Slide in der neuen Frage
						$("#lernmodusfrage .container").effect('slide', { direction: 'right', mode: 'show' }, 800);
						
					});
				
					
					$("#ab").fadeOut("slow", function(){
						$(this).css("display", "none");
						
						$("#form_aufgabe").fadeIn(6, function(){					
							$("#eingabe").val('');
						});
					});

					count++;
					if(count == $("#max").text()){
						$("#next").remove();
						$(".next").html("<button id='finished'>Auswerten</button>");
						$("#finished").bind("click", function(){	
							var url = 'lernmodus.php?finished=1';
							var form = $('<form action="' + url + '" method="post">' +
										  '<input type="hidden" name="answers" value="'+answers+'" />' +
										  '<input type="hidden" name="max" value="'+count+'" />' +
										  '</form>');
							$('body').append(form);
							form.submit();
						});
					}
						
					$("#qnr").html(count);

					$("#collapseDownloads").collapse('hide');
					$("#collapseDownloads div").text("");
				}
			});
		}
	});
});