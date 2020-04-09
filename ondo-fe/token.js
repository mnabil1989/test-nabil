const {RtcTokenBuilder, RtcRole} = require('agora-access-token')

// Rtc Examples
const appID = '193d6f008e9e43b2b9a3655808daed7d';
const appCertificate = '8a0ef8d412da4fd29f002369cc92637b';
const channelName = 'tester';
const uid = '1010101011';
// const account = "2882341273";
const role = RtcRole.PUBLISHER;

const expirationTimeInSeconds = 3600

const currentTimestamp = Math.floor(Date.now() / 1000)

const privilegeExpiredTs = currentTimestamp + expirationTimeInSeconds

// IMPORTANT! Build token with either the uid or with the user account. Comment out the option you do not want to use below.

// Build token with uid
const tokenA = RtcTokenBuilder.buildTokenWithUid(appID, appCertificate, channelName, uid, role, privilegeExpiredTs);
console.log("Token With Integer Number Uid: " + tokenA);