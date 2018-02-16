curl -s --user 'api:key-575bbbfdfc398d19a243bc1f5db2e2b3' \
    https://api.mailgun.net/v3/botiga.lapetitaoliba.cat/messages \
    -F from='Excited User <mailgun@botiga.lapetitaloiba.cat>' \
    -F to=contacte@botiga.lapetitaoliba.cat \
    -F subject='Hello' \
    -F text='Testing some Mailgun awesomeness!'
