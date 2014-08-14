/*supplier chat script*/



/*images*/
// var user_image  =  $("#header").find(".avatar img").attr("src");
// var other_image = "http://test.venturepact.com/uploads/client/small/avatar.png"


/*Function: chatInit
* -----------------------
* Parameter:
* 1. token : a alphanumeric string : to authenticate current user to firebase system
* 2. other : object(id,name) : person whom supplier going to talk
* 3. roomurl : url : where to query about room information
* 4. purposalId :
* Purpose :Initiate chat functionlity
* Action:
* This is main function which authenticates user
* and makes him online and loads rest all functionality
*/

function chatInit(user)
{
    other.name = other.name.toLowerCase();
    

    chat_ref.child('users').child(other.id).on('value', function (s)
    {
        /*it may happen that client may not be in firebase system */
        console.log('pic listening')
        if (s.val())
        {
            other.pic = s.val().pic;
            chat_ref.child('users').child(other.id).off();
        }
    });


    console.log("inside chat : " , user);
    /*if room is there */

    if($('#chat-box').data('room'))
    {
        console.log('normal mode');

        var room=$('#chat-box').data('room');

        console.log("xchat room :",room);

        /*on disconnect : offline time storage  */
        chat_ref.child('users').child(user.auth.id).onDisconnect().update({ 'offline_time': Firebase.ServerValue.TIMESTAMP });
        chat_ref.child("room-users").child(room).child(user.auth.id).onDisconnect().update({"offline_time":Firebase.ServerValue.TIMESTAMP});
        chat_ref.child("room-users").child(room).child(user.auth.id).onDisconnect().update({ "active": false });
        console.log('entering room');

        /*entering room*/
        chat.enterRoom(room);
        chat_ref.child("room-users").child(room).child(user.auth.id).update({ 'active': true });
        
        /*start functionality*/
        setWritingFunctionality(user);
        console.log("Done writing");
        setReadingFunctionality(user);
        /*offline messages*/
        /*track other user*/
        track(other);
        offlineMessagesCount(user);

        

        /*offline time record event*/

    }
    else
    {
        console.log("disabled mode");
        $('.clarification_container, #chat-box').delegate('.clarification','click',function()
        {
            console.log("#clarification clicked");
            console.log(user);
            var boottext = "Good to know that you're interested in the project. <strong>Best of Luck!</strong><br><p></p> In order to seek clarification from the client, please send a message using chat below.";
            bootbox.dialog({
                        message: boottext,
                        title: "Seek Clarification",
                        buttons: {

                             danger: {
                                label: "Cancel",
                                className: "btn-danger ",
                                callback: function () {

                                    // callback
                                }
                            },
                            success: {
                                label: "Got it!",
                                className: "btn-success",
                                callback: function () {
                                    /*on disconnect : offline time storage  */
					chat._userRef.onDisconnect().update({'offline_time':Firebase.ServerValue.TIMESTAMP});


					$('#chat-box .info').hide();
					createRoom(user);

					$('#chat-box').show();
					$('.clarification').prop('disabled','true');
                                    // callback
                                }
                            }

                        }
                    });


            return false;
        });
        console.log("project[status] :  " +  project.status);
        if(parseInt(project.status))
        {
            console.log("Inside project[status]" );
            $('#chat-box .info').hide();
            createRoom(user,1);    
        }
    }//else


}


/*function createRoom
* ---------------------
* Parameter:
* other : a object(id,name) :  to whom current user will talk
* this function create private chat room and puts current login user & "other" user in created chat-box
*/



function createRoom(user,stat)
{
    stat = (typeof stat == 'undefined')? 0 : stat;
    var chatParam = "vp-"+project.proposalId+'-'+project.projectName+'-'+other.id+'-' + project.status + '-'+project.pid;

    chat.createRoom(chatParam,"private" ,function(room)
    {
        console.log(project.roomurl + " stat : " + stat);


            //set room
            $.ajax(
            {
                url:project.roomurl,
                type:'post',
                dataType:"json",
                data:"room="+room+"&proposalId="+project.proposalId+"&action=setroom&stat="+stat,
                success:function(d)
                {
                    console.log("set room : "+ JSON.stringify(d));
                    if(!d.iserror)
                    {
                        if(d.success)
                        {
                            console.log('database updated');

                            /*
                                update other user time
                                Logic : other user (client) is offline from room since its creation
                            */
                            chat_ref.child("room-users").child(room).child(other.id).update({ 'offline_time': Firebase.ServerValue.TIMESTAMP });
                            chat_ref.child("room-users").child(room).child(other.id).update({ 'active': false });

                            /*
                                update client's room list 
                            */

                            chat_ref.child("users").child(other.id).child("rooms").child(room).update({'active': false});
                            chat_ref.child("users").child(other.id).child("rooms").child(room).update({'id': room});
                            chat_ref.child("users").child(other.id).child("rooms").child(room).update({'name':chatParam});

                            /*update current user offline time event*/

                            chat_ref.child("room-users").child(room).child(user.auth.id).onDisconnect().update({ "offline_time": Firebase.ServerValue.TIMESTAMP });
                            chat_ref.child("room-users").child(room).child(user.auth.id).onDisconnect().update({ "active": false});

                            /*
                                put current user in newly created room
                                don't remove this piece of code.

                                purpose of this line to record user's offline time in newly created room

                            */

                            chat.enterRoom(room);

                            /*
                                active : to detect user in that room if true means user is there
                                false means user is not there

                            */

                            chat_ref.child("room-users").child(room).child(user.auth.id).update({ 'active': true });

                            /*redirect*/
                            if (stat)
                            {
                                var projectid=project.proposalId;
                                $("#p_"+projectid +" li:last a").trigger("click");
                                // console.log("new url");
                                // var newurl = window.location.pathname + "?r=supplier/rfp&render=full&projectid="+project.proposalId+"&stat=2";
                                // window.location.href = newurl ;
                            }
                            else
                            {
                                console.log("new url");
                                var newurl = window.location.pathname + "?r=supplier/rfp&render=full&projectid="+project.proposalId+"&stat=1";
                                window.location.href = newurl ;

                            }

                        }
                    }
                    else
                    {
                        /*Error Handler*/
                        /*Message: unable to create room Error*/
                        console.log("Server error ");
                        return false;
                    }
                }
  });

    });
}








