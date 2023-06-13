import pygame
from pygame.locals import *
width = 500
height = 500
white=(255,255,255)

screen = pygame.display.set_mode((width, height))

# hien thi score

class vehicle(pygame.sprite.Sprite):
    def __init__(self,image,x,y):
        pygame.sprite.Sprite.__init__(self)
        #scale image
        image_scale=45 / image.get_rect().width
        new_width = image.get_rect().width*image_scale
        new_height = image.get_rect().height * image_scale
        self.image=pygame.transform.scale(image,(new_width,new_height))
        self.rect = self.image.get_rect()
        self.rect.center=[x,y]
class playervehicle(vehicle):
    def __init__(self,x,y):
        image= pygame.image.load('images/car.png')
        super().__init__(image,x,y)
class Coin(pygame.sprite.Sprite):
    def __init__(self, image, lane, y_pos):
        pygame.sprite.Sprite.__init__(self)
        self.image = image
        self.rect = self.image.get_rect()
        self.rect.centerx = lane
        self.rect.centery = y_pos
        self.type = 'coin'
class Fuel(pygame.sprite.Sprite):
    def __init__(self, image, lane, y_pos):
        pygame.sprite.Sprite.__init__(self)
        self.image = image
        self.rect = self.image.get_rect()
        self.rect.centerx = lane
        self.rect.centery = y_pos    
        self.type = 'fuel'
