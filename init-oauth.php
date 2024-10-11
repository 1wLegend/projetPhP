<?php

$discord_url = "https://discord.com/oauth2/authorize?client_id=1257084680516407356&response_type=code&redirect_uri=http%3A%2F%2Flocalhost%2FYllusion-Portal%2Fquizz.php&scope=identify+guilds";
header("Location: $discord_url");
exit();

