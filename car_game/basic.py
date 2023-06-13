import pygame
from pygame.locals import *
import random
import subprocess
from main import vehicle,playervehicle,Fuel,Coin
pygame.mixer.pre_init(frequency=44100,size=-16,channels=2,buffer=512)
pygame.init()
#maunen
gray=(100,100,100)
green=(76,208,56)
yellow=(255,232,0)
red=(200,0,0)
black=(0,0,0)
white=(255,255,255)
#tao cua so game
width=500
height=500
screen_size=(width,height)
screen = pygame.display.set_mode(screen_size)
pygame.display.set_caption('Than Xe Sieu Toc')

#Khoi tao bien
with open('coin.txt', 'r') as file:
    coins = int(file.readline())
gameover=False
gamewin=False
speed=2
#road
road_witdh=300
marker_witdh=10
marker_height=50
#lane
left_lane=150
center_lane=250
right_lane=350
left_screen=50
right_screen=450
screen_list=[left_screen,right_screen]
lane_list=[left_lane,center_lane,right_lane]
lane_move_y=0
#road and edge
road=(100,0,road_witdh,height)
left_edge=(95,0,marker_witdh,height)
right_edge=(395,0,marker_witdh,height)
#vi tri ban dau cua xe nguoi choi
player_x=250
player_y=400
game_sound=pygame.mixer.Sound('sfx_wing.wav')
crash_sound=pygame.mixer.Sound('crash.wav')
score_sound=pygame.mixer.Sound('sfx_point.wav')

coin_image = pygame.image.load('images/coin.png').convert_alpha()
coin_image = pygame.transform.scale(coin_image, (30, 30))
fuel_image = pygame.image.load('images/fuel.png').convert_alpha()
fuel_image = pygame.transform.scale(fuel_image, (30, 30))
finish_image = pygame.image.load('images/SP1.png').convert_alpha()
finish_image = pygame.transform.scale(finish_image, (520, 200))
start_time = pygame.time.get_ticks()
'''finish_line_image = pygame.image.load('images/vedich.png').convert_alpha()
finish_line_image = pygame.transform.scale(finish_line_image, (300, 50))
finish_line_rect = finish_line_image.get_rect()
finish_line_rect.bottom = 0
finish_line_visible = False'''
score=0
coin_score=coins
high_score=0
fuel_car=100
#class Finish(pygame.sprite.Sprite):
    #def __init__(self, image, lane, y_pos):
        #pygame.sprite.Sprite.__init__(self)
        #self.image = image
        #self.rect = self.image.get_rect()
        #self.rect.centerx = lane
        #self.rect.centery = y_pos
#sprite groups
player_group= pygame.sprite.Group()
vehicle_group= pygame.sprite.Group()
items_group= pygame.sprite.Group()
screen_group=pygame.sprite.Group()
#tao xe nguoi choi
player=playervehicle(player_x,player_y)
player_group.add(player)
#add xe vat can va vat pham
image_name=['pickup_truck.png','semi_trailer.png','taxi.png','van.png']
image_screen_name=['tree.png','tree2.png','tree3.png','tree4.png']
vehicle_images = []
screen_images=[]
#load hinh va cham
crash=pygame.image.load('images/crash.png')
crash_rect=crash.get_rect()

for name in image_screen_name:
    image=pygame.image.load('images/'+name)
    screen_images.append(image)
for name in image_name:
    image=pygame.image.load('images/'+name)
    vehicle_images.append(image)
def update_score(score,high_score):
    if score > high_score:
        high_score=score
    return high_score
def score_display(game_state):
    if game_state == 'run':
        font = pygame.font.Font('04B_19.TTF', 18)
        score_sur = font.render(f'Score:{score}', True, white)
        score_rect = score_sur.get_rect()
        score_rect.center = (50, 315)
        screen.blit(score_sur, score_rect)
        
        font = pygame.font.Font('04B_19.TTF', 18)
        coin_sur = font.render(f'Coin:{coin_score}', True, white)
        coin_rect = coin_sur.get_rect()
        coin_rect.center = (50, 280)
        screen.blit(coin_sur, coin_rect)
        
        font = pygame.font.Font('04B_19.TTF', 18)
        fuel_sur = font.render(f'Fuel:', True, white)
        fuel_rect = fuel_sur.get_rect()
        fuel_rect.center = (50, 20)
        screen.blit(fuel_sur, fuel_rect)
    if game_state == 'over':
        font = pygame.font.Font('04B_19.TTF', 18)

        highscore_sur = font.render(f'HighScore:', True, white)
        highscore_rect = highscore_sur.get_rect()
        highscore_rect.center = (50, 385)
        screen.blit(highscore_sur, highscore_rect)

        high_score_sur = font.render(f'{high_score}', True, white)
        high_score_rect = high_score_sur.get_rect()
        high_score_rect.center = (50, 420)
        screen.blit(high_score_sur, high_score_rect)
class Finish(pygame.sprite.Sprite):
    def __init__(self, image, lane, y_pos):
        pygame.sprite.Sprite.__init__(self)
        self.image = image
        self.rect = self.image.get_rect()
        self.rect.centerx = lane
        self.rect.centery = y_pos    
        self.type = 'finish'
class screenS(pygame.sprite.Sprite):
    def __init__(self,image,x,y):
        pygame.sprite.Sprite.__init__(self)
        #scale image
        image_scale=180 / image.get_rect().width
        new_width = image.get_rect().width*image_scale*2
        new_height = image.get_rect().height * image_scale*2
        self.image=pygame.transform.scale(image,(new_width,new_height))
        self.rect = self.image.get_rect()
        self.rect.center=[x,y]
class VachXang:
    def draw(self, screen, fuel_car):
        if fuel_car==100:
            pygame.draw.rect(screen,(255, 0, 0),(170,20,10,30))
            pygame.draw.rect(screen,(255, 128, 0),(160,20,10,27))
            pygame.draw.rect(screen,(255, 255, 0),(150,20,10,24))
            pygame.draw.rect(screen,(128, 255, 0),(140,20,10,21))
            pygame.draw.rect(screen,(0, 255, 0),(130,20,10,18))
            pygame.draw.rect(screen,(0, 255, 128),(120,20,10,15))
            pygame.draw.rect(screen,(0, 255, 255),(110,20,10,12))
            pygame.draw.rect(screen,(0, 128, 255),(100,20,10,9))
            pygame.draw.rect(screen,(0, 0, 255),(90,20,10,6))
            pygame.draw.rect(screen,(128, 0, 255),(80,20,10,3))
        if fuel_car==90:
            pygame.draw.rect(screen,(255, 128, 0),(160,20,10,27))
            pygame.draw.rect(screen,(255, 255, 0),(150,20,10,24))
            pygame.draw.rect(screen,(128, 255, 0),(140,20,10,21))
            pygame.draw.rect(screen,(0, 255, 0),(130,20,10,18))
            pygame.draw.rect(screen,(0, 255, 128),(120,20,10,15))
            pygame.draw.rect(screen,(0, 255, 255),(110,20,10,12))
            pygame.draw.rect(screen,(0, 128, 255),(100,20,10,9))
            pygame.draw.rect(screen,(0, 0, 255),(90,20,10,6))
            pygame.draw.rect(screen,(128, 0, 255),(80,20,10,3))
        if fuel_car==80:
            pygame.draw.rect(screen,(255, 255, 0),(150,20,10,24))
            pygame.draw.rect(screen,(128, 255, 0),(140,20,10,21))
            pygame.draw.rect(screen,(0, 255, 0),(130,20,10,18))
            pygame.draw.rect(screen,(0, 255, 128),(120,20,10,15))
            pygame.draw.rect(screen,(0, 255, 255),(110,20,10,12))
            pygame.draw.rect(screen,(0, 128, 255),(100,20,10,9))
            pygame.draw.rect(screen,(0, 0, 255),(90,20,10,6))
            pygame.draw.rect(screen,(128, 0, 255),(80,20,10,3))
        if fuel_car==70:
            pygame.draw.rect(screen,(128, 255, 0),(140,20,10,21))
            pygame.draw.rect(screen,(0, 255, 0),(130,20,10,18))
            pygame.draw.rect(screen,(0, 255, 128),(120,20,10,15))
            pygame.draw.rect(screen,(0, 255, 255),(110,20,10,12))
            pygame.draw.rect(screen,(0, 128, 255),(100,20,10,9))
            pygame.draw.rect(screen,(0, 0, 255),(90,20,10,6))
            pygame.draw.rect(screen,(128, 0, 255),(80,20,10,3))
        if fuel_car==60:
            pygame.draw.rect(screen,(0, 255, 0),(130,20,10,18))
            pygame.draw.rect(screen,(0, 255, 128),(120,20,10,15))
            pygame.draw.rect(screen,(0, 255, 255),(110,20,10,12))
            pygame.draw.rect(screen,(0, 128, 255),(100,20,10,9))
            pygame.draw.rect(screen,(0, 0, 255),(90,20,10,6))
            pygame.draw.rect(screen,(128, 0, 255),(80,20,10,3))
        if fuel_car==50:
            pygame.draw.rect(screen,(0, 255, 128),(120,20,10,15))
            pygame.draw.rect(screen,(0, 255, 255),(110,20,10,12))
            pygame.draw.rect(screen,(0, 128, 255),(100,20,10,9))
            pygame.draw.rect(screen,(0, 0, 255),(90,20,10,6))
            pygame.draw.rect(screen,(128, 0, 255),(80,20,10,3))
        if fuel_car==40:
            pygame.draw.rect(screen,(0, 255, 255),(110,20,10,12))
            pygame.draw.rect(screen,(0, 128, 255),(100,20,10,9))
            pygame.draw.rect(screen,(0, 0, 255),(90,20,10,6))
            pygame.draw.rect(screen,(128, 0, 255),(80,20,10,3))
        if fuel_car==30:
            pygame.draw.rect(screen,(0, 128, 255),(100,20,10,9))
            pygame.draw.rect(screen,(0, 0, 255),(90,20,10,6))
            pygame.draw.rect(screen,(128, 0, 255),(80,20,10,3))
        if fuel_car==20:
            pygame.draw.rect(screen,(0, 0, 255),(90,20,10,6))
            pygame.draw.rect(screen,(128, 0, 255),(80,20,10,3))
        if fuel_car==10:
            pygame.draw.rect(screen,(128, 0, 255),(80,20,10,3))
vach_xang = VachXang()
#cai dat fps
clock=pygame.time.Clock()
fps=120
#Vong lap xu ly game
running=True

while running:
    clock.tick(fps)
    
    for event in pygame.event.get():
        if event.type == QUIT:
            running=False
            pygame.display.quit()
            subprocess.run(["python", "interface.py"])
        
        #dieu khien xe
        if event.type==KEYDOWN:
            if event.key==K_LEFT and player.rect.center[0]>left_lane:
                game_sound.play()
                player.rect.x-=100
            if event.key==K_RIGHT and player.rect.center[0]<right_lane:
                game_sound.play()
                player.rect.x+=100
            #check va cham
            for Vehicle in vehicle_group:
                if pygame.sprite.collide_rect(player,Vehicle):
                    crash_sound.play()
                    gameover=True
    #check va cham khi xe dung yen
    if pygame.sprite.spritecollide(player,vehicle_group,True):
        crash_sound.play()
        gameover=True
        crash_rect.center=[player.rect.center[0],player.rect.top]        
                
    current_time = pygame.time.get_ticks()
    if current_time - start_time >= 4000: # đếm thời gian mỗi 1000 ms (1 giây)
        fuel_car -= 10
        start_time = current_time
    if fuel_car ==0:
        gameover=True
    
    #ve nen co
    screen.fill(green)
    
    #ve road
    pygame.draw.rect(screen,gray,road)

    #ve edge
    pygame.draw.rect(screen,yellow,left_edge)
    pygame.draw.rect(screen, yellow,right_edge)
    #chia lane
    lane_move_y+=speed*1
    if lane_move_y >= marker_height*2:
        lane_move_y=0
    for y in range(marker_height* -2,height,marker_height*2):
        pygame.draw.rect(screen,white,(left_lane+45,y+lane_move_y,marker_witdh,marker_height))
        pygame.draw.rect(screen, white, (center_lane + 45, y + lane_move_y, marker_witdh, marker_height))
    #ve xe player
    player_group.draw(screen)
    #ve xe vat can
    if len(vehicle_group)<2:
        add_vehicle=True
        for Vehicle in vehicle_group:
            if Vehicle.rect.top < Vehicle.rect.height *1.5:
                add_vehicle=False
        if add_vehicle:
            lane=random.choice(lane_list)
            image=random.choice(vehicle_images)
            Vehicle=vehicle(image,lane,height/-2)
            vehicle_group.add(Vehicle)
              
            
    
    #cho xe vat can chay
    for Vehicle in vehicle_group:
        Vehicle.rect.y += speed
        #remove xe vat can
        if Vehicle.rect.top >= height:
            Vehicle.kill()
            score +=1
            score_sound.play()
            #tang speed
            if score>0 and score % 10==0:
                speed +=0.4
            if score % 3==0:
                lane = random.choice(lane_list)
                coin = Coin(coin_image, lane, height/-2)
                items_group.add(coin)
            if score % 5==0:
                lane = random.choice(lane_list)
                fuel = Fuel(fuel_image, lane, height/-2)
                items_group.add(fuel)
            if score == 10:
                finish= Finish(finish_image,190,height/-2)
                items_group.add(finish)
                
                
                
    if len(screen_group)<1:
        add_screen=True 
        for i in screen_group:
            if i.rect.top < i.rect.height *5:
                add_screenL=False
        if add_screen: 
            lane=random.choice(screen_list)
            image_screen=random.choice(screen_images)
            Screen=screenS(image_screen,lane,height/-5)
            screen_group.add(Screen)   
    for Screen in screen_group:
        Screen.rect.y += speed
        if Screen.rect.top >= height:
            Screen.kill()          
    for Items in items_group:
        Items.rect.y += speed
        items_collide = pygame.sprite.spritecollide(player, items_group, True)
        for item in items_collide:
            if item.type == 'fuel':
                fuel_car += 20
                item.kill()
            elif item.type == 'coin':
                coin_score += 1
                item.kill()
                with open('coin.txt', 'w') as file:
                    file.write(str(coin_score)) 
            elif item.type == 'finish':
                gamewin=True         
    #ve nhom xe vat can
    vehicle_group.draw(screen)
    items_group.draw(screen)
    screen_group.draw(screen)
    vach_xang.draw(screen, fuel_car) 
    score_display('run')
    if gameover:
        screen.blit(crash,crash_rect)
        pygame.draw.rect(screen,red,(0,50,width,100))
        font = pygame.font.Font('04B_19.TTF',25)
        text = font.render(f'Game over! Play again?(Y/N)', True, white)
        text_rect = text.get_rect()
        
        text_rect.center = (width/2, 100)
        screen.blit(text, text_rect)
        high_score=update_score(score, high_score)
        score_display('over')
    if gamewin:
        pygame.draw.rect(screen,red,(0,50,width,100))
        font = pygame.font.Font('04B_19.TTF',25)
        text = font.render(f'Conglatulation! Back to menu?(Press O)', True, white)
        text_rect = text.get_rect()
        text_rect.center = (width/2, 100)
        screen.blit(text, text_rect)
        
    pygame.display.update()
    while gameover:
        clock.tick(fps)

        for event in pygame.event.get():
            if event.type == QUIT:
                gameover = False
                running=False
            if event.type == KEYDOWN:
                if event.key == K_y:
                    gameover=False
                    score=0
                    speed=2
                    fuel_car=100
                    coin_score=coins
                    vehicle_group.empty()
                    player.rect.center=[player_x,player_y]
                elif event.key==K_n:
                    gameover=False
                    running=False
                    pygame.display.quit()
                    subprocess.run(["python", "interface.py"])
    while gamewin:
        clock.tick(fps)
        for event in pygame.event.get():
            if event.type == QUIT:
                running=False
                pygame.display.quit()
            if event.type == KEYDOWN:
                if event.key == K_o:
                    running=False
                    pygame.display.quit()
                    subprocess.run(["python", "interface.py"])
    pygame.display.flip()                  
pygame.quit()