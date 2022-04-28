//למחוק דף זה

var CLIENT_ID='311907961848-vq6m25iu7jo8u1anb6cd295o7kra54dn.apps.googleusercontent.com';
var API_KEY = 'AIzaSyDKVtfgAYtCB_zwmVEImvIUAAAVrKLGSL8';

function App(){
    var gapi= window.gapi
    var CLIENT_ID='311907961848-vq6m25iu7jo8u1anb6cd295o7kra54dn.apps.googleusercontent.com';
    var API_KEY = 'AIzaSyDKVtfgAYtCB_zwmVEImvIUAAAVrKLGSL8';
    var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest"];
    var SCOPES = "https://www.googleapis.com/auth/calendar.readonly";

    const handleClick = () => {
        gapi.load('client:auth2',()=>{
            console.log('loaded client')

            gapi.client.init({
                apiKey: API_KEY,
                alientId: CLIENT_ID,
                DISCOVERYdOCS: DISCOVERY_DOCS,
                scope: SCOPES,
            })
            gapi.client.load('calendar', 'v3', ()=> console.log('bam!'))
            gapi.auth2.getAuthInstance().sighnIn()
            .then(()=>{
                var event = {
                    'summary': 'Google I/O 2015',
                    'location': '800 Howard St., San Francisco, CA 94103',
                    'description': 'A chance to hear more about Google\'s developer products.',
                    'start': {
                      'dateTime': '2015-05-28T09:00:00-07:00',
                      'timeZone': 'America/Los_Angeles'
                    },
                    'end': {
                      'dateTime': '2015-05-28T17:00:00-07:00',
                      'timeZone': 'America/Los_Angeles'
                    },
                    'recurrence': [
                      'RRULE:FREQ=DAILY;COUNT=2'
                    ],
                    'attendees': [
                      {'email': 'lpage@example.com'},
                      {'email': 'sbrin@example.com'}
                    ],
                    'reminders': {
                      'useDefault': false,
                      'overrides': [
                        {'method': 'email', 'minutes': 24 * 60},
                        {'method': 'popup', 'minutes': 10}
                      ]
                    }
                  };
                  
                  var request = gapi.client.calendar.events.insert({
                    'calendarId': 'primary',
                    'resource': event
                  });
                  
                  request.execute(function(event) {
                    appendPre('Event created: ' + event.htmlLink);
                  });
            })
        }       
        )
    }

}