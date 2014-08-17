/*client chat*/

function chatInit(user)
{
    other.name = other.name.toLowerCase();
    chat_ref.child('users').child(other.id).once('value', function (s) {
        other.pic = s.val().pic;
    });

    var room = $('#chat-box').data('room');

    chat.enterRoom(room);
    chat_ref.child("room-users").child(room).child(user.auth.id).update({ 'active': true });

    console.log("user entered in room");

    setWritingFunctionality(user);
    setReadingFunctionality(user);
    
    offlineMessagesCount(user);
    track(other);

    /*on disconnect : offline time storage  */
    chat._userRef.onDisconnect().update({'offline_time':Firebase.ServerValue.TIMESTAMP});
    chat_ref.child("room-users").child(room).child(user.auth.id).onDisconnect().update({"offline_time":Firebase.ServerValue.TIMESTAMP});
    chat_ref.child("room-users").child(room).child(user.auth.id).onDisconnect().update({ "active": false });
}
