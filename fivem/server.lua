local httpEndpoint = "http://votre-domaine.com/addlogs.php"  
local logQueue = {}

local function enqueueLog(eventType, description)
    table.insert(logQueue, {event_type = eventType, description = description})
    print("Log en file d'attente : " .. eventType)
end

local function processLogQueue()
    if #logQueue > 0 then
        local logItem = logQueue[1]
        local jsonData = json.encode(logItem)
        PerformHttpRequest(httpEndpoint, function(err, text, headers)
            if err == 200 then
                print("Log envoyé avec succès : " .. logItem.event_type)
                table.remove(logQueue, 1)
            else
                print("Erreur lors de l'envoi du log (" .. logItem.event_type .. ") : " .. tostring(err))
            end
        end, "POST", jsonData, {["Content-Type"] = "application/json"})
    end
end

Citizen.CreateThread(function()
    while true do
        processLogQueue()
        Citizen.Wait(5000) 
    end
end)

local function logEvent(eventType, description)
    enqueueLog(eventType, description)
    processLogQueue()
end

AddEventHandler('playerConnecting', function(playerName, setKickReason, deferrals)
    local msg = "Le joueur " .. playerName .. " se connecte."
    logEvent("connexion", msg)
end)

AddEventHandler('playerDropped', function(reason)
    local playerName = GetPlayerName(source)
    local msg = "Le joueur " .. playerName .. " s'est déconnecté. Raison : " .. reason
    logEvent("deconnexion", msg)
end)

AddEventHandler('baseevents:onPlayerDied', function(playerId, pos, weapon, killerId)
    local playerName = GetPlayerName(playerId)
    local killerName = (killerId and GetPlayerName(killerId)) or "inconnu"
    local weaponUsed = weapon or "inconnue"
    local msg = "Le joueur " .. playerName .. " est mort. Tue par : " .. killerName .. " avec : " .. weaponUsed
    logEvent("mort", msg)
end)

AddEventHandler('esx:onAddInventoryItem', function(source, item, count)
    local playerName = GetPlayerName(source)
    local msg = "Le joueur " .. playerName .. " a reçu " .. count .. " x " .. item
    logEvent("item_donne", msg)
end)



