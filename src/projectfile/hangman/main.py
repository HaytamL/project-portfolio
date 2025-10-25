import pygame
import random
fichiermot=open('hangman/myotherlist.txt','r')
fichierrecordL=open('hangman/bestscore.txt','r')

pygame.init()
background=pygame.image.load("hangman/img/hanground.jpg")
background=pygame.transform.scale(background, (1400, 1000))
fenetre=pygame.display.set_mode((1400, 1000))
white=(255,255,255)
font=pygame.font.Font("hangman/Z003-MediumItalic.t1",24)

def drawstick(surface):
    color = white
    x = 700
    y = 450
    pygame.draw.circle(surface, color, (x, y), 30, 1)
    pygame.draw.line(surface, color, (x, y+30), (x, y+120), 1)
    pygame.draw.line(surface, color, (x, y+70), (x-50, y), 1)
    pygame.draw.line(surface, color, (x, y+70), (x+50, y+90), 1)
    pygame.draw.line(surface, color, (x, y+120), (x-40, y+200), 1)
    pygame.draw.line(surface, color, (x, y+120), (x+40, y+200), 1)

def checkrecord(f,n):
    x=list(f)
    if len(n)> int(x[0]):
        recordperdu=font.render("Votre record est de "+str(x[0])+", dommage vous avez réussi à trouver le mot "+str(randomword)+" en "+str(len(n))+" essais.",255,white)
        fenetre.blit(recordperdu, (300, 850))
        pygame.display.flip()
    elif len(n)==int(x[0]):
        recorddraw=font.render("Vous avez égalé votre record...",255,white)
        fenetre.blit(recorddraw, (300, 850))
        pygame.display.flip()
    elif len(n)<int(x[0]):
        recordbattu=font.render("Nouveau record ! "+ str(len(n))+" essais pour le mot "+str(randomword),255,white)
        fenetre.blit(recordbattu, (300, 850))
        pygame.display.flip()
        fichierrecordE=open('hangman/bestscore.txt','w')
        fichierrecordE.write(str(len(n)))

def checkloose(n,x):
    if n>=x:
        perdu=font.render("PENDUUUU !!!!!",255,white)
        fenetre.blit(perdu, (300, 750))
        return True
    else :
        return False

def randomnumber():
    a={1,2,3,4,5,6}
    return random.choice(list(a))

def lenword(word):
    n=len(word)
    underscore=""
    for i in range(n):
        underscore+="_"
    return(underscore)

def wordtries(word, letter, test1):
    n=len(word)
    for i in range(n):
        if word[i]==letter:
           test1[i]=letter
    lettres=font.render(" ".join(test1),255,white)
    rect_text = lettres.get_rect(topleft=(150, 400))
    fenetre.blit(background, rect_text, rect_text)
    fenetre.blit(lettres, (150, 400))
    pygame.display.flip()

maxerreur=6

hangimages = []
for i in range(maxerreur + 1):
    img = pygame.image.load(f"hangman/img/hangman{str(i)}.png")
    img = pygame.transform.scale(img, (300, 300))
    hangimages.append(img)

fenetre.blit(background, (0, 0))
fenetre.blit(hangimages[0], (900, 500))
welcometext=font.render("Bienvenue dans ce jeu du pendu, sachez que le mot à deviner est français !",255,white)
fenetre.blit(welcometext, (400, 150))
pygame.display.flip()
extraireword = random.choice(list(fichiermot))
randomword = extraireword[:-1]

texte1 = font.render(lenword(randomword), 255, white)
fenetre.blit(background, (150, 400), (150, 400, 500, 30))
fenetre.blit(texte1, (150, 400))

texte2 = font.render("Votre mot contient donc "+str(len(randomword))+" lettres", 255, white)
fenetre.blit(background, (120, 440), (120, 440, 400, 30))
fenetre.blit(texte2, (120, 440))

texte3 = font.render("Chaque lettre entrée compte comme un essai, alors faites attention !", 255, white)
fenetre.blit(background, (120, 480), (120, 480, 700, 30))
fenetre.blit(texte3, (120, 480))

pygame.display.flip()

compteurerreur=0
triedletters=""
test=list(lenword(randomword))

while checkloose(compteurerreur,maxerreur)==False:
    triedL=font.render("Voici les lettres que vous avez déjà essayées : "+str(triedletters)+", vous avez actuellement "+str(compteurerreur)+" erreur.",255,white)
    rect_triedL = triedL.get_rect(topleft=(300, 250))
    fenetre.blit(background, rect_triedL, rect_triedL)
    fenetre.blit(triedL, (300, 250))
    pygame.display.flip()
    a = ""
    waiting_for_letter = True
    while waiting_for_letter:
        for event in pygame.event.get():
            if event.type == pygame.QUIT:
                pygame.quit()
                exit()
            if event.type == pygame.KEYDOWN:
                if event.unicode.isalpha() and event.unicode.islower():
                    a = event.unicode
                    waiting_for_letter = False
                elif event.key == pygame.K_ESCAPE:
                    pygame.quit()
                    exit()

    if a in triedletters:
        alrT=font.render("Vous avez déjà entré cette lettre !",255,white)
        rect_alrT = alrT.get_rect(topleft=(300, 200))
        fenetre.blit(background, rect_alrT, rect_alrT)
        fenetre.blit(alrT, (300, 200))
    else:
        triedletters+=a
        if a in randomword:
            goodL=font.render("Bonne lettre trouvée!",255,white)
            rect_goodL = goodL.get_rect(topleft=(760, 450))
            fenetre.blit(background, rect_goodL, rect_goodL)
            fenetre.blit(goodL, (800, 450))
            wordtries(randomword,a, test)
        else:
            badL=font.render("Aha! mauvaise lettre!",255,white)
            rect_badL = badL.get_rect(topleft=(800, 450))
            fenetre.blit(background, rect_badL, rect_badL)
            fenetre.blit(badL, (800, 450))
            compteurerreur+=1
            fenetre.blit(background, (900, 500), (900, 500, 300, 300))
            fenetre.blit(hangimages[compteurerreur], (900, 500))
            pygame.display.flip()
            texte = font.render(" ".join(test), 255, white)
            fenetre.blit(background, (150, 400), (150, 400, 500, 30))
            fenetre.blit(texte, (150, 400))
            pygame.display.flip()
            checkloose(compteurerreur,maxerreur)
        if list(randomword)==list(test):
            texte = font.render("Vous avez gagné !", 255, white)
            fenetre.blit(background, (300, 700), (300, 700, 300, 30))
            fenetre.blit(texte, (300, 700))
            pygame.display.flip()
            checkrecord(fichierrecordL, triedletters)
            break
texte = font.render("Le mot était "+str(randomword)+".", 255, white)
fenetre.blit(background, (300, 800), (300, 800, 400, 30))
fenetre.blit(texte, (300, 800))
pygame.display.flip()
waiting = True
while waiting:
    for event in pygame.event.get():
        if event.type == pygame.QUIT:
            waiting = False
pygame.quit()
