# Dominanten verkkosivut

Teknologiat: Sisällönhallintajärjestelmä [Wordpress](https://wordpress.org/),
HTML/CSS-kirjasto [Skeleton](http://getskeleton.com/)

Kehitysympäristö omalla koneella: [Varying Vagrant Vagrants](https://github.com/Varying-Vagrant-Vagrants/VVV)

Hostaus: [AYY:n verkkosivupalvelin Otax](https://otax.fi/fi/)

## Kehitysympäristö

Käytämme [Vagrant](https://www.vagrantup.com/) -virtualisointialustaa ja [Varying Vagrant Vagrants](https://github.com/Varying-Vagrant-Vagrants/VVV) -kehitysympäristöä (lyhyemmin VVV). 

Ohjeet kehitysympäristön asentamiseen:

1) Seuraa ohjeita [Software
Requirements](https://varyingvagrantvagrants.org/docs/en-US/installation/software-requirements/)
-sivulta omalle käyttöjärjestelmällesi. Esimerkki Mac-käyttäjille:
```bash
# 1) Asenna Homebrew seuraamalla ohjeita https://brew.sh/ 
# 2) Asenna Virtualbox ja Vagrant:
brew install caskroom/cask/brew-cask
brew cask install vagrant virtualbox
# 3) Asenna tarvittavat Vagrant-lisäosat:
vagrant plugin install vagrant-hostsupdater vagrant-triggers vagrant-vbguest
# 4) Käynnistä tietokoneesi uudelleen.
```

2) Asenna [Git](https://git-scm.com/) ja kloonaa verkkosivujen Git-repo komennolla 
```
git clone https://github.com/Dominante/website [hakemiston-nimi]`
```

3) Mene repon hakemistoon `cd [hakemiston-nimi]` ja alusta VVV-kehitysympäristö komennolla `vagrant up`. Tämä muun muassa asentaa virtualisoidun Ubuntu-käyttöjärjestelmän ja siksi alustaminen voi viedä aikaa. Lue VVV:n [Installation](https://varyingvagrantvagrants.org/docs/en-US/installation/)-sivulta "What Did That Do" -osio jos haluat tutustua kehitysympäristöön tarkemmin.

4) VVV-Kehitysympäristön pitäisi nyt olla pystyssä. Käy osoittesssa `http://vvv.test/`
tarkistaaksesi että VVV on käynnissä.

5) Lue ohjeet kehitysympäristön sammuttamiseen/käynnistämiseen VVV:n [Basic
Usage](https://varyingvagrantvagrants.org/docs/en-US/references/basic-usage/)
-sivulta.

## Staattinen verkkosivu

Alkuun teemme yksinkertaisen staattisen version sivusta, joka ei käytä WordPressiä. Jos sinulla on kehitysympäristö
käynnissä, staattinen sivu näkyy osoitteessa
`http://dominante-static`.

Staattisen verkkosivun HTML/CSS/JS -tiedostot ovat hakemistossa
`www/dominante-static/public_html`.

## WordPress-sivusto

Ei vielä ajankohtaista

## Päivittäminen Otaxiin

Ei vielä ajankohtaista
