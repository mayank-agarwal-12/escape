$(document).ready(function(){$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}}),$(".eventSignUp").click(function(){$.ajax({url:"/events/signUp",data:{id:$(this).attr("value")},type:"POST",dataType:"json"}).done(function(t){"success"==t.status?($("#signUpMsg_"+t.id).addClass("alert-"+t.status).text(t.msg).show(),$(".eventSignUp").hide()):($("#signUpMsg_"+t.id).addClass("alert-danger").text(t.msg).show(),$(".eventSignUp").hide())}).fail(function(t,e,n){$(".signUpMsg").addClass("alert-danger").text("Something went wrong").show(),$(".eventSignUp").hide()})})});