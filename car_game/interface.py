import pygame
import subprocess
from pygame.locals import *

pygame.init()
red=(200,0,0)
black=(0,0,0)
white=(255,255,255)
width = 500
height = 500
with open('coin.txt', 'r') as file:
    coins = int(file.readline())
screen = pygame.display.set_mode((width, height))
pygame.display.set_caption('Than Xe Sieu Toc')
def giao_dien():
        global button1, button2, button3, button4,gear_icon_rect,image_car,image_lambac2,image_lam_vang,image_mec_bac,image_lambo_x,image_khoa,image_khoa,image_khoa,image_khoa,gear_icon
        image_bg=pygame.image.load('images/nen.webp')
        image_bg = pygame.transform.scale(image_bg, (700, 500))
        gear_icon = pygame.image.load("images/gear.png")
        gear_icon=pygame.transform.scale(gear_icon,(50,50))
        gear_icon_rect = pygame.Rect(430, 10, 50, 50)
        
        screen.blit(image_bg,(0,0))
        pygame.draw.rect(screen,(158,194,220), gear_icon_rect)
        screen.blit(gear_icon, gear_icon_rect)
        font = pygame.font.Font(None, 36)
        button1 = pygame.Rect(30, 160, 200, 50)
        button2 = pygame.Rect(30, 320, 200, 50)
        button3 = pygame.Rect(250, 160, 200, 50)
        button4 = pygame.Rect(250, 320, 200, 50)
        image_logo=pygame.image.load('images/speedrace.png')
        image_logo = pygame.transform.scale(image_logo, (190, 150))
        image_basic=pygame.image.load('images/basic.jpg')
        image_basic = pygame.transform.scale(image_basic, (200, 100))
        image_desert=pygame.image.load('images/desert.jpg')
        image_desert = pygame.transform.scale(image_desert, (200, 100))
        image_beach=pygame.image.load('images/beach.jpg')
        image_beach = pygame.transform.scale(image_beach, (200, 100))
        image_universe=pygame.image.load('images/universe.jpg')
        image_universe = pygame.transform.scale(image_universe, (200, 100))
        image_car=pygame.image.load('images/car.png')
        image_car = pygame.transform.scale(image_car, (65,110))
        image_lambac2=pygame.image.load('images/lam-bac2.png')
        image_lambac2 = pygame.transform.scale(image_lambac2, (70,110))
        image_lam_vang=pygame.image.load('images/lam-vang.png')
        image_lam_vang = pygame.transform.scale(image_lam_vang, (70,110))
        image_mec_bac=pygame.image.load('images/mec-bac.png')
        image_mec_bac = pygame.transform.scale(image_mec_bac, (70,120))
        image_lambo_x=pygame.image.load('images/lambo-x.png')
        image_lambo_x = pygame.transform.scale(image_lambo_x, (110,100))
        screen.blit(image_logo,(160,15))
        text1 = font.render("Basic race", True, (255, 255, 255))
        pygame.draw.rect(screen, (255, 0, 0), button1)
        screen.blit(image_basic,(30,210))
        screen.blit(text1, (button1.centerx - text1.get_width() // 2, button1.centery - text1.get_height() // 2))
        text2 = font.render("Desert race", True, (255, 255, 255))
        pygame.draw.rect(screen,(160,82,45), button2)
        screen.blit(image_desert,(30,370))
        screen.blit(text2, (button2.centerx - text2.get_width() // 2, button2.centery - text2.get_height() // 2))
        text3 = font.render("Beach race", True, (255, 255, 255))
        pygame.draw.rect(screen, (0,154,205), button3)
        screen.blit(image_beach,(250,210))
        screen.blit(text3, (button3.centerx - text3.get_width() // 2, button3.centery - text3.get_height() // 2))
        text4 = font.render("Uniserve race", True, (255, 255, 255))
        pygame.draw.rect(screen, (110,123,139), button4)
        screen.blit(image_universe,(250,370))
        screen.blit(text4, (button4.centerx - text4.get_width() // 2, button4.centery - text4.get_height() // 2))
        font = pygame.font.Font('04B_19.TTF',25)
        text = font.render(f'COIN:{coins}', True, white)
        text_rect = text.get_rect()
        text_rect.center = (40, 20)
        screen.blit(text, text_rect)
        
show_setting=False    
car_setting_rects = []
while True:
    giao_dien()
    for event in pygame.event.get():
        if event.type == pygame.QUIT:
            pygame.quit()
            quit()
        elif event.type == pygame.MOUSEBUTTONDOWN:
            mouse_pos = pygame.mouse.get_pos()
            if button1.collidepoint(mouse_pos):
                pygame.display.quit()
                subprocess.run(["python", "basic.py"])
            elif button2.collidepoint(mouse_pos):
                pygame.display.quit()
                subprocess.run(["python", "desert.py"])
            elif button3.collidepoint(mouse_pos):
                pygame.display.quit()
                subprocess.run(["python", "beach.py"])
            elif button4.collidepoint(mouse_pos):
                pygame.display.quit()
                subprocess.run(["python", "universe.py"])
            elif gear_icon_rect.collidepoint(event.pos):
                show_setting=True
            
                
                car_setting_rects = [
                    pygame.draw.rect(screen, (255, 255, 255), (120, 165, 70, 70)),
                    pygame.draw.rect(screen, (255, 255, 255), (210, 165, 70, 70)),
                    pygame.draw.rect(screen, (255, 255, 255), (300, 165, 70, 70)),
                    pygame.draw.rect(screen, (255, 255, 255), (165, 300, 70, 70)),
                    pygame.draw.rect(screen, (255, 255, 255), (255, 310, 70, 70)),
                    pygame.draw.rect(screen, (255, 255, 255), (225, 200, 40, 40)),
                    pygame.draw.rect(screen, (255, 255, 255), (315, 200, 40, 40)),
                    pygame.draw.rect(screen, (255, 255, 255), (183, 350, 40, 40)),
                    pygame.draw.rect(screen, (255, 255, 255), (290, 350, 40, 40)),
                ]
            elif event.type == pygame.MOUSEBUTTONDOWN and show_setting:
                for car_rect in car_setting_rects:
                    if car_rect.collidepoint(event.pos):
                        # handle car selection here
                        pass
                if close_rect.collidepoint(event.pos):
                    show_setting = False
                    # draw over car settings
                    pygame.draw.rect(screen, (255, 228, 181), (70, 50, 350, 400))
                    giao_dien()
    
                        
    if show_setting:
        key1_icon_rect = pygame.Rect(215, 280, 60, 25)
        key2_icon_rect = pygame.Rect(305,280, 60, 25)
        key3_icon_rect = pygame.Rect(170,420,60, 25)
        key4_icon_rect = pygame.Rect(280,420, 60, 25)
        show_key1=True
        show_key2=True
        show_key3=True
        show_key4=True
        if event.type == pygame.MOUSEBUTTONDOWN:
            mouse_pos = pygame.mouse.get_pos()
            if key1_icon_rect.collidepoint(event.pos):
                show_key1=False
            elif key2_icon_rect.collidepoint(event.pos):
                show_key2=False
            elif key3_icon_rect.collidepoint(event.pos):
                show_key3=False
            elif key4_icon_rect.collidepoint(event.pos):
                show_key4=False
        pygame.draw.rect(screen,(255,228,181),(70,50,350,400))
        font = pygame.font.Font('04B_19.TTF',25)
        text = font.render('Select car', True, black)
        text_rect = text.get_rect()
        text_rect.center = (width/2, 100)
        screen.blit(text, text_rect)
        
        # vẽ nút thoát "x"
        close_font = pygame.font.Font('04B_19.TTF', 20)
        close_text = close_font.render('X', True, black)
        close_rect = close_text.get_rect()
        close_rect.x = 400
        close_rect.y = 60
        screen.blit(close_text, close_rect)
        
        screen.blit(image_car,(120,165))
        screen.blit(image_lambac2,(210,165))
        screen.blit(image_lam_vang,(300,165))
        screen.blit(image_mec_bac,(165,300))
        screen.blit(image_lambo_x,(255,310))
        
        
        
        
        if show_key1:
            text1 = font.render("500", True, (255, 255, 255))
            pygame.draw.rect(screen, (255, 0, 0), key1_icon_rect)
            screen.blit(text1, (key1_icon_rect.centerx - text1.get_width() // 2, key1_icon_rect.centery - text1.get_height() // 2))
        if show_key2:
            text2 = font.render("500", True, (255, 255, 255))
            pygame.draw.rect(screen, (255, 0, 0), key2_icon_rect)
            screen.blit(text2, (key2_icon_rect.centerx - text1.get_width() // 2, key2_icon_rect.centery - text2.get_height() // 2))
        if show_key3:
            text3 = font.render("500", True, (255, 255, 255))
            pygame.draw.rect(screen, (255, 0, 0), key3_icon_rect)
            screen.blit(text3, (key3_icon_rect.centerx - text3.get_width() // 2, key3_icon_rect.centery - text3.get_height() // 2))
        if show_key4:
            text4 = font.render("500", True, (255, 255, 255))
            pygame.draw.rect(screen, (255, 0, 0), key4_icon_rect)
            screen.blit(text2, (key4_icon_rect.centerx - text4.get_width() // 2, key4_icon_rect.centery - text4.get_height() // 2))
        pygame.display.update()
        
    pygame.display.update()
    