$(document).ready(function(){
		var conn = new WebSocket('ws://localhost:8080');
		conn.onopen = function(e) {
		    console.log("Connection established!");
		};

		conn.onmessage = function(e) {
		    console.log(e.data);
		    var data = JSON.parse(e.data);
		    var row = '<tr><td valign="top"><div><strong>' + data.from +'</strong></div><div>'+data.msg+'</div><td align="right" valign="top">'+data.dt+'</td></tr>';
		    $('#chats > tbody').prepend(row);

		};

		conn.onclose = function(e) {
			console.log("Connection Closed!");
		}

		$("#send").click(function(){
			var userId 	= $("#userId").val();
			var msg 	= $("#msg").val();
			var data = {
				userId: userId,
				msg: msg
			};
			conn.send(JSON.stringify(data));
			$("#msg").val("");
		});

		$("#leave-chat").click(function(){
			var userId 	= $("#userId").val();
			$.ajax({
				url:"action.php",
				method:"post",
				data: "userId="+userId+"&action=leave"
			}).done(function(result){
				var data = JSON.parse(result);
				if(data.status == 1) {
					conn.close();
					location = "index.php";
				} else {
					console.log(data.msg);
				}
				
			});
			
		})

	})